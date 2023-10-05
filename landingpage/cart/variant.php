<?php
require_once '././php/connect.php';

// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a database connection established
$variantQuery = "SELECT * FROM variant_tb WHERE ProductID = :itemTypeID";
$itemTypeID = $_POST['itemTypeID']; // You can pass the itemTypeID through AJAX

// Execute the query and fetch data as an array
// Replace 'your_database_connection' with your actual database connection code
$statement = $your_database_connection->prepare($variantQuery);
$statement->bindParam(':itemTypeID', $itemTypeID, PDO::PARAM_INT);
$statement->execute();
$variants = $statement->fetchAll(PDO::FETCH_ASSOC);

// Prepare the options as JSON
$options = json_encode(array_column($variants, 'Size')); // Assuming 'Size' is the column name

// Return JSON response
header('Content-Type: application/json');
echo $options;
