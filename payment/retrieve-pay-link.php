<?php
require_once('../vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.paymongo.com/v1/links/' . $_GET['pay_link_id'], [
    'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic c2tfdGVzdF85a3dEOFFyb1ZhTFp2dTZ5SzdlWGlmR046',
    ],
]);

echo $response->getBody();
