<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

if (isset($_POST['SaveItem'])) {


    $lname = $_POST['employee_lname'];
    $fname = $_POST['employee_fname'];
    $mname = $_POST['employee_mname'];
    $nickname = $_POST['employee_nickname'];
    $bdate = $_POST['employee_bdate'];
    $marital = $_POST['marital'];
    $sex = $_POST['sex'];
    $title = $_POST['title'];
    $position = $_POST['position'];
    $employeesdate = $_POST['employee_sdate'];
    $depart = $_POST['dept'];
    $email = $_POST['email'];

    $item_id = $_POST['item_id'];





    $sql = "UPDATE employee_tb
    SET
        lname = '$lname',
        fname = '$fname',
        mname = '$mname',
        title = '$title',
        position = '$position',
        sex = '$sex',
        bDate = '$bdate',
        nickName = '$nickname',
        departmentID =  '$depart',
        dateStart = '$employeesdate',
        password = '$hashedPassword', 
        userName = '$email',
        maritalStatus = '$marital',
        modifiedDate = now()
    
    ";

    // check if password is changed
    if (isset($_POST['Password'])) {
        $password = $_POST['Password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = $sql . ", password = $hashedPassword";
    }

    // id condition to edit
    $sql = $sql . "WHERE
    DatabaseID = '$item_id';";


    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Edited an Employee.";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edited an Employee. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
