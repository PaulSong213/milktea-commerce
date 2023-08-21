<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['item_id'];
    $Sname = $_POST['supplier_name'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNum'];
    $faxNumber = $_POST['faxNum'];
    $celNumber = $_POST['CelNum'];
    $contactNumber = $_POST['contactNum'];
    $Snote = $_POST['Snote'];

    $sql = "UPDATE supplier_tb
    SET
        supplier_name = '$Sname',
        address = '$address',
        telNum = '$itemTypeID',
        faxNum = '$faxNumber',
        CelNum ='$celNumber', 
        contactNo ='$contactNumber', 
        Snote ='$Snote',
        modifiedDate = now()
    WHERE
        supplier_code = '$item_id';
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
