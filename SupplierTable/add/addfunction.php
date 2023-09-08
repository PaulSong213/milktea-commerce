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
    $Sname = $_POST['supplier_name'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNum'];
    $faxNumber = $_POST['faxNum'];
    $celNumber = $_POST['CelNum'];
    $contactNumber = $_POST['contactNum'];
    $Snote = $_POST['Snote'];

    $sql = "INSERT INTO supplier_tb (supplier_name, address, telNum, faxNum, CelNum, contactNo, Snote, createDate, modifiedDate)
    VALUES ('$Sname', '$address', '$telNumber', '$faxNumber','$celNumber', '$contactNumber', '$Snote', NOW(), NOW())";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Item";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Item. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
