<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['item_id'];
    $departmentName = $_POST['departmentName'];
    $departmentDescription = $_POST['departmentDescription'];

    $sql = "UPDATE department_tb
    SET
        departmentName = '$departmentName',
        departmentDescription = '$departmentDescription'
      
    WHERE
        departmentID = '$itemTypeID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Edited an Department";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edit an Department. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
