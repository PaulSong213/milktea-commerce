<?php
require_once('../vendor/autoload.php');
session_start();


$client = new \GuzzleHttp\Client();
$amount = $_GET['amount'];
$description = $_GET['description'];
$remarks = $_GET['remarks'];

$response = $client->request('POST', 'https://api.paymongo.com/v1/links', [
  'body' => '{"data":{"attributes":{"amount":' . $amount . ',"description":"' . $description . '","remarks":"' . $remarks . '"}}}',
  'headers' => [
    'accept' => 'application/json',
    'authorization' => 'Basic c2tfbGl2ZV9XeUhOeEJqajZ3Mmo3RkJQNFB3SEVIR1I6',
    'content-type' => 'application/json',
  ],
]);

$_SESSION['pay_link_id'] = json_decode($response->getBody())->data->id;
echo $response->getBody();
