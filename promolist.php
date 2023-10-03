<?php
require_once '././php/connect.php';

// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'category' parameter is set in the GET request
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Construct the SQL query based on the selected category (if any)
$query = "SELECT * FROM promo_tb";

$result = $conn->query($query);

$imageUrls = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageUrls[] = '././inventory/'. $row["promoImage"];
    }
}

// Close the database connection
$conn->close();

// Return the image URLs as JSON
header('Content-Type: application/json');
echo json_encode($imageUrls);
?>
