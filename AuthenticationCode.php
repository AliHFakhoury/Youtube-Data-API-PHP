<?php
$scope         =   'https://www.googleapis.com/auth/youtube.upload';
$client_id      =   'CLIENT ID';
$redirect_uri   =   'http://localhost/phpyoutube/uploadVideo.php';

$params = array(
                    'response_type' =>   'code',
                    'client_id'     =>   $client_id,
                    'redirect_uri'  =>   $redirect_uri,
                    'scope'         =>   $scope
                    );
$url = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);        
echo $url."\n";
?>