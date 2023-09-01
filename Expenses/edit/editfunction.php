<?php
require_once '../../php/connect.php';
$conn = connect();
session_start();

if (isset($_POST['SaveItem'])) {
    $expenseType = $_POST['expenseType'];
    $department = $_POST['department'];
    $amount = $_POST['amount'];
    $payable = $_POST['payable'];
    $docRef = $_POST['docRef'];
    $reason = $_POST['reason'];
    $Note = $_POST['Note'];
    $enteredBy = $_POST['enteredBy'];
    $requestedBy = $_POST['resquestedBy'];


    $sql = "UPDATE expense_tb
    SET
        expenseType = '$expenseType',
        department = '$department',
        amount = '$amount',
        payable = '$payable',
        docRef = '$docRef',
        reason = '$reason',
        Note = '$Note',
        enteredBy = '$enteredBy',
        requestedBy = '$requestedBy', 
        modifiedDate = now()    
    WHERE
        expenseID = '$expenseID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Edited an Item Type";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edited an Item Type. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
