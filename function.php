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

?>