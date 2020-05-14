<?php

$fileName = "https://raw.githubusercontent.com/filiptronicek/maas/master/subreddits.txt";

$subs = file($fileName);


function getMeme(){

    try {
        global $subs, $fileName;

        if(isset($_GET['r'])) {
            $sub = $_GET['r'];
        } else {
            $sub = $subs[array_rand($subs, 1)];
        }
        /*
        $sub = str_replace(" ","",$sub);
        $sub = preg_replace("/ /", "%20", $sub);
        */
            
        $urlPath = 'https://meme-api.herokuapp.com/gimme/'.$sub;
        $rurlPath = str_replace(' ', '', $urlPath);
        $url = file_get_contents(preg_replace('/\s+/', '', $urlPath));
    
        $url = json_decode($url);
        $url = $url->url;
    
        $data = file_get_contents($url);

        if(!$data) {
            //getMeme();
        }
    } catch (Exception $e) {
       // getMeme();
    } finally {
        $ext = explode(".", $url);
        $ext = end($ext);
        /*
        echo $urlPath;
        echo '<br><img src="'.$url.'">';
        */
        header('R-subreddit: '.$sub);
        header("Content-type: image/" . $ext);
        echo $data;
    }
}
getMeme();
