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
    $supplier_code = $_POST['supplier_code'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNum'];
    $faxNumber = $_POST['faxNum'];
    $celNumber = $_POST['CelNum'];
    $contactNumber = $_POST['contactNo'];
    $Snote = $_POST['note'];

    $sql = "INSERT INTO supplier_tb (supplier_name,supplier_code, address, telNum, faxNum, CelNum, contactNo, note, createDate, modifiedDate)
    VALUES ('$Sname', '$supplier_code','$address', '$telNumber', '$faxNumber','$celNumber', '$contactNumber', '$Snote', NOW(), NOW())";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $act = "Add New Supplier Data";
        $description = "Add New Supplier Data";

        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
        $result1 = mysqli_query($conn1, $sql1);
        // success
        $_SESSION["alert_message"] = "Successfully Added a Supplier";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Supplier. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
