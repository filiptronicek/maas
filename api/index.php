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
        
        if(isset($_GET['q'])) {
            $quality = $_GET['q'];
        } else {
            $quality = "high";
        }
            
        $urlPath = 'https://meme-api.herokuapp.com/gimme/'.$sub;
        $url = file_get_contents(preg_replace('/\s+/', '', $urlPath));
    
        $url = json_decode($url);
        if ($quality === "high") {
            $url = $url->url;
        } else {
            //print_r($url->preview[0]);
            $url = strval($url->preview[0]);
        }
    
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
        if ($quality === "high") { 
            header("Content-type: image/" . $ext);
        } else {
            header("Content-type: image/webp");            
        }
        echo $data;
    }
}
getMeme();
