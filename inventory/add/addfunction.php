<?php
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    $statusData = 1;

    $sql = "INSERT INTO inventory_tb (itemCode, Type, Unit, Description, Generic, SugPrice, MWprice, IPDprice, Ppriceuse,createDate, Status, modifiedDate)
    VALUES ('$itemCode', '$type', '$unit', '$description', '$generic', '$sugPrice', '$mwPrice', '$ipdPrice', '$ppriceUse', now(),' $statusData', now())";

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
