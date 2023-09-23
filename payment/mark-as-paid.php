<?php
// check if the parameter paymentID is set
if (!isset($_GET['paymentID'])) {
    echo "paymentID is not set";
    http_response_code(422);
    exit();
}

$paymentID = $_GET['paymentID'];

// check if the payment link ID is paid 
require_once('../vendor/autoload.php');
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.paymongo.com/v1/links/' . $paymentID, [
    'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic c2tfdGVzdF8yS3VmZFhTTE1xWHJkYUhZZ2lTWlVxUjU6',
    ],
]);
$paymentInfo = json_decode($response->getBody());
$paymentStatus = $paymentInfo->data->attributes->status;
if ($paymentStatus != "paid") {
    echo "payment is not yet paid";
    http_response_code(422);
    exit();
}

// modify sales table status to preparing-food
require_once '../php/connect.php';
session_start();
$conn = connect();

$sql = "UPDATE sales_tb
    SET
        status = 'preparing-food'
    WHERE
        paymentID = '$paymentID';
    ";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Failed to update sales table";
    http_response_code(500);
    exit();
}

// return the sales ID
$sql = "SELECT SalesID 
    FROM sales_tb 
    WHERE paymentID = '$paymentID'";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Failed to Fetch the Sales ID. Sales has been updated to preparing-food";
    http_response_code(500);
    exit();
}
$SalesID = mysqli_fetch_assoc($result)['SalesID'];
echo $SalesID;
$_SESSION["OPENED_ORDER_NO"] = $SalesID;
