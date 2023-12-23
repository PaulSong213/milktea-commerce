<?php
require_once '../../php/connect.php';
// Establish a database connection
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Perform the deletion from the database using SQL
        // Replace 'inventory_tb' with the actual name of your database table
        $sql = "DELETE FROM variant_tb WHERE variantID = $id";

        // Execute the SQL query
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $conn->error]);
        }

        exit;
    }
}

// Handle the case when the request is not as expected
echo json_encode(['success' => false, 'error' => 'Invalid request.']);
