<?php
session_start();
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {

    $expenseType = $_POST['expenseType'];
    $department = $_POST['department'];
    $amount = $_POST['amount'];
    $payable = $_POST['payable'];
    $docRef = $_POST['docRef'];
    $reason = $_POST['reason'];
    $Note = $_POST['Note'];
    $enteredBy = $_POST['enteredByName'];
    $requestedBy = $_POST['requestedBy'];

    $sql = "INSERT INTO expenses_tb (expenseType, departmentID, amount, payableTo, docRef, reason, note, enteredBy, requestedBy, dateEntered, datePost)
    VALUES ('$expenseType', '$department','$amount','$payable','$docRef','$reason','$Note','$enteredBy','$requestedBy',NOW(),NOW())";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Item Type";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Item Type. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
