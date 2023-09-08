<?php
require_once '../../php/connect.php';
$conn = connect();
session_start();

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['itemTypeID'];
    $description = $_POST['description'];
    $itemTypeCode = $_POST['itemTypeCode'];

    $sql = "UPDATE itemtype_tb
    SET
        itemTypeCode = '$itemTypeCode',
        description = '$description',
        modifiedDate = now()
    WHERE
        itemTypeID = '$itemTypeID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Edited an Item Type";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edited an Item Type. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
