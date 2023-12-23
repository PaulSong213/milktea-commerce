<<?php
    require_once '../../php/connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            // Perform the deletion from the database using SQL
            // Replace 'your_table_name' with the actual name of your database table
            $sql = "DELETE FROM inventory_tb WHERE InventoryID = $id";

            // Execute the SQL query
            $success = $pdo->exec($sql);

            // Check if the query was successful
            if ($success !== false) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => $pdo->errorInfo()]);
            }

            exit;
        }
    }

    // Handle the case when the request is not as expected
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
    ?>