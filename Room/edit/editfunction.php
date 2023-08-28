<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['item_id'];
    $Sname = $_POST['room_ref'];
    $address = $_POST['room_description'];
    $telNumber = $_POST['rate_per_day'];
   
    $sql = "UPDATE room_tb
    SET
        Roomref = '$Sname',
        room_ref = '$address',
        telNum = '$telNumber',
        faxNum = '$faxNumber',
        CelNum ='$celNumber', 
        contactNo ='$contactNumber', 
        Snote ='$Snote',
        modifiedDate = now()
    WHERE
        supplier_code = '$itemTypeID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Edited an Item";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edit an Item. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
