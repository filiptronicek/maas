<?php
$url = file_get_contents('https://meme-api.herokuapp.com/gimme');
$url = json_decode($url);
$url = $url->url;

$data = file_get_contents($url);

$ext = explode(".", $url);
$ext = end($ext);
header("Content-type: image/" . $ext);
echo $data;
