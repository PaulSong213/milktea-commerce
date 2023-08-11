<?php
require_once '../php/connect.php';
$conn = connect();

if (isset($_POST['SaveItem'])) {
    $itemCode = $_POST['item_code'];
    $type = $_POST['type'];
    $unit = $_POST['Unit'];
    $description = $_POST['description'];
    $generic = $_POST['Generic'];
    $sugPrice = $_POST['Sugprice'];
    $mwPrice = $_POST['MWprice'];
    $ipdPrice = $_POST['IPDprice'];
    $ppriceUse = $_POST['Ppriceuse'];
    $item_id = $_POST['item_id'];
    $statusData = 1;

    $sql = "UPDATE inventory_tb
    SET
        Type = '$type',
        Unit = '$unit',
        Description = '$description',
        Generic = '$generic',
        SugPrice = '$sugPrice',
        MWprice = '$mwPrice',
        IPDprice = '$ipdPrice',
        Ppriceuse = '$ppriceUse',
        Status = '$statusData',
        itemCode = '$itemCode',
        modifiedDate = now()
    WHERE
        InventoryID = '$item_id';
    ";

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
