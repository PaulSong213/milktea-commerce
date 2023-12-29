<?php
require_once('../vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.paymongo.com/v1/links/' . $_GET['pay_link_id'], [
    'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic c2tfbGl2ZV9XeUhOeEJqajZ3Mmo3RkJQNFB3SEVIR1I6',
    ],
]);

echo $response->getBody();
