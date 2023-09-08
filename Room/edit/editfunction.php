<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $userDepartment = $userData['departmentName'];
}

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['item_id'];
    $roomref = $_POST['room_ref'];
    $roomdesc = $_POST['room_description'];
    $rateperday = $_POST['rate_per_day'];
   
    $sql = "UPDATE room_tb
    SET
        Roomref = '$roomref',
        roomDescription = '$roomdesc',
        rateperDay = '$rateperday'
        
    WHERE
        room_ID = '$itemTypeID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $act = "Edit Department Data";
        $description = "Edit Department Data ";

        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
        $result1 = mysqli_query($conn1, $sql1);

        $_SESSION["alert_message"] = "Successfully Edited an Room";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edit an Room. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
