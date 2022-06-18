<?php
error_reporting(0);
header('Content-Type: application/json');
Function colorize($image)
{
    $url = 'https://playback.fm/colorize-photo';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = array();
    $headers[] = 'accept: */*';
    $headers[] = 'content-type: multipart/form-data';
    $headers[] = 'origin: https://playback.fm';
    $headers[] = 'referer: https://playback.fm/colorize-photo';
    $headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ["image" => $image, "xhr"=> "true"]);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$image = new CURLFILE("image.jpg"); // image location

echo colorize($image);
