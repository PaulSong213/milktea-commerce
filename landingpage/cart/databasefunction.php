<?php
require_once '././php/connect.php';
// Establish a database connection
$conn = connect();
// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = isset($_GET['category']) ? $_GET['category'] : null;

$query = "SELECT inventoryID, image, itemCode, SugPrice, itemTypeID FROM inventory_tb";
if ($category) {
    $query .= " WHERE itemTypeID = '$category'";
}
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // ... rest of your code
    }
} else {
    echo '<div class="no-products">No Products Available</div>';
}
