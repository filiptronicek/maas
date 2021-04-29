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
            
        $urlPath = 'https://meme-api.herokuapp.com/gimme/'.$sub;
        $url = file_get_contents(preg_replace('/\s+/', '', $urlPath));
    
        $url = json_decode($url);
        $url = $url->url;
    
        $data = file_get_contents($url);

        if(!$data) {
            getMeme();
        }
    } catch (Exception $e) {
        getMeme();
    } finally {
        $ext = explode(".", $url);
        $ext = end($ext);

        header('R-subreddit: '.$sub);
        header("Content-type: image/" . $ext);
        echo $data;
    }
}
getMeme();
