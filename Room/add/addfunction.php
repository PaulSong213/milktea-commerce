<?php
session_start();
require_once '../../php/connect.php';
$conn = connect();
if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $userDepartment = $userData['departmentName'];
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {
    $romRef = $_POST['room_ref'];
    $roomDescrip = $_POST['room_description'];
    $ratedateDay = $_POST['rate_per_day'];
  

    $sql = "INSERT INTO room_tb (Roomref, roomDescription, rateperDay)
    VALUES ('$romRef', '$roomDescrip', '$ratedateDay')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $act = "Add New Room Data";
        $description = "Add New Room Data";

        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
        $result1 = mysqli_query($conn1, $sql1);
        // success
        $_SESSION["alert_message"] = "Successfully Added an Room";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Room. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
