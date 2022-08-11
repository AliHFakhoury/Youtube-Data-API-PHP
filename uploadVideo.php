<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Youtube::YOUTUBE_FORCE_SSL);
$client->setAccessType('offline');

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $youtube = new Google_Service_YouTube($client);
    $channel = $youtube->channels->listChannels('snippet', ['forUsername' => 'alihassan1998']);
    echo json_encode($channel);
} else {
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/phpyoutube/oauth2callback.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}