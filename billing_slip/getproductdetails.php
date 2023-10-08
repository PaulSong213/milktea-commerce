<?php
require_once '../php/connect.php';
$conn = connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$InventoryID = $_GET['InventoryID'];
$query = "SELECT  inventory_tb.UnitType, inventory_tb.image, inventory_tb.InventoryID ,itemtype_tb.description AS itemtype_description ,itemtype_tb.itemTypeID, inventory_tb.Description AS itemDescription
FROM inventory_tb LEFT JOIN itemtype_tb ON 
inventory_tb.itemTypeID = itemtype_tb.itemTypeID WHERE InventoryID = '$InventoryID'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'inv' => 0,
        'unit' => $row['UnitType'],
        'price' => 0,
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
