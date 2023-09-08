<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

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
    $item_id = $_POST['item_id'];

    $sql = "UPDATE inventory_tb
    SET
        Unit = '$unit',
        UnitType = '$UnitType',
        itemTypeID = '$itemTypeID',
        Description = '$description',
        Generic = '$generic',
        SugPrice = '$sugPrice',
        MWprice = '$mwPrice',
        IPDprice = '$ipdPrice',
        Ppriceuse = '$ppriceUse',
        itemCode = '$itemCode',
        modifiedDate = now()
    WHERE
        InventoryID = '$item_id';
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
