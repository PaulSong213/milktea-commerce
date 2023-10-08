<?php
require_once '../php/connect.php';
$conn = connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$itemTypeID = $_GET['itemTypeID'];
$query = "SELECT * FROM variant_tb WHERE ProductID = '$itemTypeID'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $response = array();
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo json_encode(array());
}
$conn->close();
