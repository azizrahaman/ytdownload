<?php

if(isset($_POST['url'])) {
    $url = $_POST['url'];
    $ext = strtolower($_POST['ext']);
    $name = 'data.'.$ext;

    

    // echo $url . "<br>";
    // echo $ext . "<br>";
    header('Content-Description: File Transfer');
    header('Content-Type: video/mp4');
    header('Content-Disposition: attachment; filename='.$name);
    //header('Content-Type: application/force-download');


    // header('Content-Type: application/octet-stream');
    // header("Content-Transfer-Encoding: Binary");    
    // header("Content-Disposition: attachment; filename=video.".$ext);
    //readfile("https://r3---sn-n5hvoapoxcq-q5je.googlevideo.com/videoplayback?mn=sn-n5hvoapoxcq-q5je%2Csn-npoeenez&source=youtube&signature=392FAC9CED8842AE35DE10A0A1EBCB6DEAD59062.39372EAFB5F4DD6B15D84F8C6818E6A2FED830D3&clen=17793362&requiressl=yes&mime=video%2Fmp4&aitags=133%2C134%2C135%2C136%2C137%2C160%2C242%2C243%2C244%2C247%2C248%2C264%2C271%2C278&fvip=3&mm=31%2C29&expire=1526804192&mt=1526782492&pl=24&mv=m&ei=gNoAW86DKdy4ogONt6agAQ&ms=au%2Crdu&gir=yes&ip=103.86.109.32&pcm2cms=yes&sparams=aitags%2Cclen%2Cdur%2Cei%2Cgir%2Cid%2Cip%2Cipbits%2Citag%2Ckeepalive%2Clmt%2Cmime%2Cmm%2Cmn%2Cms%2Cmv%2Cpcm2cms%2Cpl%2Crequiressl%2Csource%2Cexpire&c=WEB&keepalive=yes&id=o-AFSNxfrKmFw2cimiB7CmNRJEMdUamOPmbZP-em6LSFVV&ipbits=0&itag=137&lmt=1507170844362493&key=yt6&dur=66.958");
    readfile($url);

    //exit();
} else {
    echo "no data";
}

?>