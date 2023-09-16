<?php
require_once('../vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.paymongo.com/v1/links/' . $_GET['pay_link_id'], [
    'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic c2tfdGVzdF8yS3VmZFhTTE1xWHJkYUhZZ2lTWlVxUjU6',
    ],
]);

echo $response->getBody();
