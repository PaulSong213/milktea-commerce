<?php
require_once '../../php/connect.php';

// Sanitize and validate user input
$orderID = isset($_GET['orderID']) ? intval($_GET['orderID']) : 0;

if ($orderID <= 0) {
    echo json_encode(["error" => "Invalid orderID"]);
    exit();
}

$conn = connect();

// Use prepared statement to prevent SQL injection
$query = "SELECT COUNT(*) AS count FROM orders_tb WHERE orderID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $orderID);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Provide a meaningful error message
    echo json_encode(["error" => "Database error"]);
}

$stmt->close();
$conn->close();
