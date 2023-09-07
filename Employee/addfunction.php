<?php
session_start();
require_once '../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//PRINT ALL VALUES

if (isset($_POST['SaveItem'])) {
    $lname = $_POST['employee_lname'];
    $fname = $_POST['employee_fname'];
    $mname = $_POST['employee_mname'];
    $nickname = $_POST['employee_nickname'];
    $bdate = $_POST['employee_bdate'];
    $marital = $_POST['marital'];
    $sex = $_POST['sex'];
    $dept = $_POST['dept'];
    $title = $_POST['title'];
    $position = $_POST['position'];
    $startDate = $_POST['employee_sdate'];
    $username = $_POST['email'];
    $password = $_POST['Password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO employee_tb (lname, fname, mname, nickName, bDate, maritalStatus, sex, departmentID, title, position, dateStart, userName, password, createDate, modifiedDate)
        VALUES ('$lname', '$fname', '$mname', '$nickname', '$bdate', '$marital', '$sex', '$dept', '$title', '$position', '$startDate', '$username', '$hashedPassword', NOW(), NOW())";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Employee";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Employee. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ./index.php");
    die();
}


// Close the database connection
$conn->close();
