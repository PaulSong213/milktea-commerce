<?php
require_once '../../php/connect.php';
$conn = connect();
session_start();

// If user is not logged in, redirect to login page
// if (!isset($_SESSION['user'])) {
//     header('Location: ' . __DIR__ . '/login.php');
//     exit();
// }
// $current_user = json_decode($_SESSION['user'], true);
// $user_id = $current_user['hospistalrecordNo '];
$user_id = 8; // TODO: once login is implemented, use the above code instead
$query = "SELECT * FROM sales_tb
    WHERE PatientAcct = $user_id 
    AND status != 'delivered' 
    ORDER BY createDate DESC";

$result = $conn->query($query);

// Fetch data and convert to JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
