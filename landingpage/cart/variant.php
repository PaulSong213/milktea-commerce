<?php
require_once '././php/connect.php';

// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if it's an AJAX request
if(isset($_POST['itemTypeID'])) {
    // Fetch variants based on the item type ID received via AJAX
    $itemTypeID = $_POST['itemTypeID'];
    $variantQuery = "SELECT * FROM variant_tb WHERE ProductID = :itemTypeID";

    // Execute the query and fetch data as an array
    $statement = $conn->prepare($variantQuery);
    $statement->bindParam(':itemTypeID', $itemTypeID, PDO::PARAM_INT);
    $statement->execute();
    $variants = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the options as an HTML string
    $optionsHTML = '';
    foreach ($variants as $variant) {
        $optionsHTML .= "<option value='{$variant['Size']}'>{$variant['Size']}</option>";
    }

    // Return the options HTML
    header('Content-Type: text/html');
    echo $optionsHTML;
} else {
    // Handle non-AJAX requests or invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo "Invalid request.";
}
?>
