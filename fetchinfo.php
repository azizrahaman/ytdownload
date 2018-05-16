<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $url = $_POST['yturlname'];

        $vid = $_POST['yturlname']; // Youtube video ID
        //$vformat = $_GET['vformat']; // The MIME type of the video. e.g. video/mp4, video/webm, etc.
        parse_str(file_get_contents("http://youtube.com/get_video_info?video_id=".$vid),$info);
        $streams = $info['url_encoded_fmt_stream_map'];

        var_dump($streams);

        $streams = explode(',',$streams);

        foreach($streams as $stream) {
            parse_str($stream, $data);
            $video = fopen($data['url'].'&signature='.$data['sig'],'r'); //the video
            $file = fopen('video.mp4','w');

            var_dump($video);
            var_dump($file);
        }
    }

?>