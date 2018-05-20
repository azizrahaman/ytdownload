<?php

    function getdata($url) {
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;

    }

    function secondstoduration($seconds) {
        $durationmin = intval($seconds/60);
        $durationsec = $seconds%60;
        $duration = $durationmin . " minute " . $durationsec . " seconds";
        return $duration;
    }

    function getStream($stream) {
        $video_formats = array();
        foreach($stream as $format) {
            parse_str($format, $format_info);
            if(isset($format_info['bitrate'])) {
                $resulation = isset($format_info['quality_label']) ? $format_info['quality_label']:round($format_info['bitrate']/1000) . 'k';
            }
            else {
                $resulation = isset($format_info['quality'])?$format_info['quality']:'';
            }
            $type = explode(';', $format_info['type']);
            switch($type[0]) {
                case 'video/3gpp' :
                    $type = '3GP';
                    break;
                case 'video/mp4' :
                    $type = 'MP4';
                    break;
                case 'video/webm' :
                    $type = 'WebM';
                    break;
                case 'video/3gpp' :
                    $type = '3GP';
                    break;
                default:
                    $type = $type[0];
               
            }

            $video_formats[] = [
                'itag' => $format_info['itag'],
                'resulation' => $resulation,
                'type' => $type,
                'url' => $format_info['url'],
                'size' => getSize($format_info['url'])
            ];
        }
        //echo json_encode($video_formats);
        return $video_formats;
    }

    function getSize($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $r = curl_exec($ch);
        foreach (explode("\n", $r) as $header) {

            if(strpos($header, 'Content-Length:') === 0 ) {
                return round(trim(substr($header, 16)) / (1024*1024), 2) . " MB";
            }
        }
    }

?>