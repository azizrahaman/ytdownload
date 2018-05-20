<?php
    include 'function.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // $video_id = $_GET['v'];
        $url = $_POST['yturlname'];
        $title = 'video';
        parse_str($url, $urlArr);

        $video_id = array_values($urlArr)[0];
        
        $data = file_get_contents("https://www.youtube.com/get_video_info?video_id=$video_id&asv=3&el=detailpage&hl=en_US");
        parse_str($data, $array);
        $info = json_decode(json_encode($array));
        
        $videodata = array();

        $videodata['title'] = $info->title;
        $videodata['author'] = $info->author;
        $totalsec = $info->length_seconds;
        $videodata['duration'] = secondstoduration($totalsec);
        $videodata['thumbnail'] = "http://i1.ytimg.com/vi/$video_id/hqdefault.jpg";
        $videodata['viewcount'] = $info->view_count;

        

        //echo json_encode($info);

        if(isset($info->url_encoded_fmt_stream_map)) {
            //$streamsFormat = explode(',', $info->adaptive_fmts);
            //$videodata['stream'] = getStream($streamsFormat);
            
            
            $arr = explode(",", $info->url_encoded_fmt_stream_map);
            $testarr = array();
            foreach ($arr as $item) {
                parse_str($item);
                $vidsize = getSize($url);
                $typex = explode(';',$type);
                $vidtype = $typex[0];
                $newtitle = $string = str_replace(' ', '_', $info->title);

                $videodata['stream'][] = [
                    'url' =>  $url,
                    'title' => $newtitle,
                    'type' => $vidtype,
                    'resulation' => $quality,
                    'size' => $vidsize
                ];
            }

            // echo json_encode($testarr);

            echo json_encode($videodata);

        }
    } 