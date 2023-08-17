<?php
require_once '../../php/connect.php';
$conn = connect();

if (isset($_POST['SaveItem'])) {
   
    
    $lname = $_POST['employee_lname'];
    $fname = $_POST['employee_fname'];
    $mname = $_POST['employee_maname'];
    $nickname = $_POST['employee_nickname'];
    $bdate = $_POST['employee_bdate'];
    $marital = $_POST['marital'];
    $sex = $_POST['sex'];
    $title = $_POST['title'];
    $position = $_POST['position'];
    $employeesdate = $_POST['employee_sdate'];
    $depart = $_POST['depart'];
    $email = $_POST['email'];
    $password= $_POST['Password'];
    $statusData = 1;

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
        Status = '$statusData',
        department =  '$depart',
        dateStart = '$employeesdate',
        password = '$password', 
        email = '$email',
        modifiedDate = now()
    WHERE
        DatabaseID = '$item_id';
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../index.php");
        die();
    } else {
        header("Location: ../index.php");
        die();
    }
}

// Close the database connection
$conn->close();
