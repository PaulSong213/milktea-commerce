<?php
require_once '../php/connect.php';
$conn = connect();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM variant_tb";
$variantResult = $conn->query($query);
$VariantData = (object)array(); // Create an empty object

while ($row = $variantResult->fetch_assoc()) {
    $variantID = $row['variantID'];
    $variantName = $row['variantName'];
    $price = $row['price'];

    if (!isset($chargeData->$SalesID)) {
        $VariantData->$variantID = (object)array(
            "id" => $variantID,
            "data" => $row
        );
    }
}

$VariantData = json_encode($VariantData);
$conn->close();

// Return the JSON data
echo $VariantData;
?>
