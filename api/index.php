<?php

//$subs = [];

$fileName = "https://raw.githubusercontent.com/filiptronicek/maas/master/subreddits.txt";

$subs = file($fileName);

$sub = $subs[array_rand($subs, 1)];

$urlPath = 'https://meme-api.herokuapp.com/gimme/'.$sub;

//echo $urlPath;

$url = file_get_contents($urlPath);
$url = json_decode($url);
$url = $url->url;

$data = file_get_contents($url);

$ext = explode(".", $url);
$ext = end($ext);

header("Content-type: image/" . $ext);
echo $data;
