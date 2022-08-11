<?php
    require_once 'vendor/autoload.php';

    session_start();

    $client = new Google_Client();
    $client->setAuthConfigFile('client_secret.json');
    $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/phpyoutube/oauth2callback.php');
    $client->addScope(Google_Service_Youtube::YOUTUBE_FORCE_SSL);


    if (! isset($_GET['code'])) {
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    } else {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/phpyoutube/uploadVideo';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }

?>