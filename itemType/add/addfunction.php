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
    $itemTypeCode = $_POST['itemTypeCode'];
    $description = $_POST['description'];
    $is_drinkable = $_POST['TypeID'];

    $sql = "INSERT INTO itemtype_tb (itemTypeCode, is_drinkable, description)
    VALUES ('$itemTypeCode', '$is_drinkable', '$description')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $act = "Add New Item Type";
        $description = "Add Item Type Data  [$itemTypeCode]";

        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        				VALUES ('$userID', '$act', '$description', NOW())";
        $result1 = mysqli_query($conn1, $sql1);

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
