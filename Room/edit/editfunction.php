<?php
require_once '../../php/connect.php';
$conn = connect();
session_start();

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['room_ID'];
    $roomRef = $_POST['roomRef'];//1 lname
    $roomDescription= $_POST['roomDescription'];//1 lname
    $rateperDay = $_POST['rateperDay'];//1 lname


    $sql = "UPDATE room_tb
    SET
      Roomref = '$roomRef',
      roomDescription = '$roomDescription',
      rateperDay = '$rateperDay',
    WHERE
        room_ID = '$itemTypeID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Edited an Patient Information";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edited an Patient Information. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
