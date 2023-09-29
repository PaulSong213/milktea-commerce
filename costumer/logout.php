<?php
session_start(); // Start or resume the existing session

require_once('../php/connect.php');
if (isset($_SESSION['costumer'])) {
    $userData = json_decode($_SESSION['costumer'], true);
    $userID = $userData->costumerID;
}
echo $userID;

$action = "Log out";
$description = "Costumer Log out";

$conn1 = connect();
$sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$action', '$description', NOW())";

$result1 = mysqli_query($conn1, $sql1);
if ($result1) {
    // success
    unset($_SESSION['costumer']);
    header("Location: /milktea-commerce/costumer/login.php"); // Change 'login.php' to your actual login page
    exit();
} else {
    $_SESSION["alert_message"] = " Error Details: " . mysqli_error($conn);
    $_SESSION["alert_message_error"] = true;
}
