<?php
require_once '../../php/connect.php';
$conn = connect();
$orderID = $_GET['orderID']; // Make sure to sanitize and validate user input

$query = "
UPDATE orders_tb
SET isPaid = 1
WHERE orderID = '$orderID';
";

$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
