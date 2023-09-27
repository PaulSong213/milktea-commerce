<?php
require_once '../php/connect.php';
$conn = connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$itemCode = $_GET['itemCode'];
$query = "SELECT inventory_tb.Unit, inventory_tb.UnitType, inventory_tb.image, inventory_tb.InventoryID ,inventory_tb.SugPrice, itemtype_tb.description AS itemtype_description ,itemtype_tb.itemTypeID, inventory_tb.Description AS itemDescription
FROM inventory_tb LEFT JOIN itemtype_tb ON 
inventory_tb.itemTypeID = itemtype_tb.itemTypeID WHERE itemCode = '$itemCode'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'inv' => $row['Unit'],
        'unit' => $row['UnitType'],
        'price' => $row['SugPrice'],
        'itemtype' => $row['itemtype_description'],
        'id' => $row['InventoryID'],
        'image' => $row['image'],
        'itemTypeID' => $row['itemTypeID'],
        'itemDescription' => $row['itemDescription']
    );
    echo json_encode($response);
} else {
    echo json_encode(array());
}
$conn->close();
