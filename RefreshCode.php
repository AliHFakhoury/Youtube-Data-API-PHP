<?php
require_once 'vendor/autoload.php';

$url = 'https://accounts.google.com/o/oauth2/token';
$post_data = array(
                    'client_id'     =>   'CLIENT ID',
                    'client_secret' =>   'CLIENT SECRET',
                    'grant_type'    =>   'client_credentials',
                    'scope'         =>   Google_Service_Youtube::YOUTUBE_FORCE_SSL,
                    );
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$token = json_decode($result);

var_dump($result);
?>