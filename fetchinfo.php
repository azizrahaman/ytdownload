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

        if(!$info->status == 'OK') {
            echo "No Videos";
        } else {
            //echo json_encode($info);
            
            $video = array();
            $video['title'] = $info->title;
            $video['thumnail']= $info->thumbnail_url;
            $video['author']= $info->author;
            $video['duration'] = secondstoduration($info->length_seconds);
            $video['thumnail']= $info->thumbnail_url;
            $video['thumnail']= $info->thumbnail_url;

            echo json_encode($video);
        }
    }

?>