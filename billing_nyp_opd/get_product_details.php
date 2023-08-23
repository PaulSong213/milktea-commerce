<?php
require_once '../php/connect.php';
$conn = connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$itemCode = $_GET['itemCode'];
$query = "SELECT inventory_tb.Unit, inventory_tb.UnitType,  inventory_tb.InventoryID ,inventory_tb.SugPrice, itemtype_tb.itemTypeCode ,itemtype_tb.itemTypeID FROM inventory_tb LEFT JOIN itemtype_tb ON 
inventory_tb.itemTypeID = itemtype_tb.itemTypeID WHERE itemCode = '$itemCode'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'inv' => $row['Unit'],
        'unit' => $row['UnitType'],
        'price' => $row['SugPrice'],
        'itemtype' => $row['itemTypeCode'],
        'id' => $row['InventoryID'],
        'itemTypeID' => $row['itemTypeID']
    );
    echo json_encode($response);
} else {
    echo json_encode(array());
}
$conn->close();
