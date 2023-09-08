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
    $departmentName = $_POST['departmentName'];
    $departmentDescription = $_POST['departmentDescription'];
    

    $sql = "INSERT INTO department_tb (departmentName, departmentDescription)
    VALUES ( '$departmentName', '$departmentDescription')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success

        $act = "Add New Department Data";
        $description = "Add New Department Data  [$departmentName]";

        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
        $result1 = mysqli_query($conn1, $sql1);
        $_SESSION["alert_message"] = "Successfully Added an Department";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Department. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
