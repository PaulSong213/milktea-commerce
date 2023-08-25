<?php
session_start();
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {
    $roomRef = $_POST['roomRef'];//1 lname
    $roomDescription= $_POST['roomDescription'];//1 lname
    $rateperDay = $_POST['rateperDay'];//1 lname

    $sql = "INSERT INTO room_tb (Roomref, roomDescription, rateperDay)
    VALUES ('$roomRef','$roomDescription', '$rateperDay')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        //success
        $_SESSION["alert_message"] = "Successfully Added an Patient";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Patient. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
