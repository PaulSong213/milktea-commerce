<?php
// Database configuration
$host = 'localhost';
$dbName = 'zaratehospital';
$username = 'root';
$password = '';


// Establish a database connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    $currentAddedDateTime = date('Y-m-d H:i:s');
    $currentModifiedDateTime = date('Y-m-d H:i:s');

   $sql = "INSERT INTO employee_tb (EmployeeCode, lname, fname, mname, nickName, bDate, maritalStatus, sex, department, title, position, dateStart, userName, password, createDate, modifiedDate)
        VALUES ('$employeeCode', '$lname', '$fname', '$mname', '$nickname', '$bdate', '$marital', '$sex', '$dept', '$title', '$position', '$startDate', '$username', '$password', '$currentAddedDateTime', '$currentModifiedDateTime')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ./index.php");
        die();
    } else {
        header("Location: ./index.php");
        die();
    }
}

// Close the database connection
$conn->close();
?>
