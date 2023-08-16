<?php
session_start();
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {
    $itemCode = $_POST['item_code'];
    $UnitType = $_POST['UnitType'];
    $itemTypeID = $_POST['itemTypeID'];
    $unit = $_POST['Unit'];
    $description = $_POST['description'];
    $generic = $_POST['Generic'];
    $sugPrice = $_POST['Sugprice'];
    $mwPrice = $_POST['MWprice'];
    $ipdPrice = $_POST['IPDprice'];
    $ppriceUse = $_POST['Ppriceuse'];
    $statusData = 1;

    $sql = "INSERT INTO inventory_tb (itemCode, UnitType, Unit, itemTypeID,Description, Generic, SugPrice, MWprice, IPDprice, Ppriceuse,createDate, Status, modifiedDate)
    VALUES ('$itemCode', '$UnitType', '$unit', '$itemTypeID','$description', '$generic', '$sugPrice', '$mwPrice', '$ipdPrice', '$ppriceUse', now(),' $statusData', now())";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Item";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Item. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
