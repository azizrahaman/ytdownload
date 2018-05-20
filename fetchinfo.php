<?php
    require 'function.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $url = $_POST['yturlname'];
        parse_str($url, $urlInfo);

        $vid_id = array_values($urlInfo)[0];
        $url = "http://www.youtube.com/get_video_info?video_id=$vid_id&el=embedded&ps=default&eurl=&gl=US&hl=en";
        
        $data = getdata($url);

        parse_str($data, $info);

        $info = json_decode(json_encode($info));
        if($info->status !== 'ok') {
            echo "No Videos";
            die();
        } else {
            //echo json_encode($info);
            
            $video = array();
            $video['title'] = $info->title;
            $video['thumbnail']= "http://i1.ytimg.com/vi/$vid_id/hqdefault.jpg";
            $video['author']= 'Author - ' . $info->author;
            $video['duration'] = 'Duration - ' . secondstoduration($info->length_seconds);
            $video['totalviwe']= 'View Count - ' . $info->view_count;

            if(!isset($info->url_encoded_fmt_stream_map)) {
                die('No Data');
            }

            $stream = explode(',', $info->url_encoded_fmt_stream_map);

            if(isset($info->adaptive_fmts)) {
                $streamsFormat = explode(',', $info->adaptive_fmts);
                $video['nStream'] = getStream($streamsFormat);
                //echo json_encode($nStream);
            }

            echo json_encode($video);
        }
    }

?>
