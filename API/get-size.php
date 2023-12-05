<?php
require_once '../php/connect.php';
$conn = connect();
$inventoryID = $_GET['inventoryID'];
$queryCharge = "
SELECT
   *
FROM
    variant_tb
WHERE ProductID = '$inventoryID'
;";
$resultCharge = $conn->query($queryCharge);

while ($row = $resultCharge->fetch_assoc()) {
    echo "<option value='" . $row['description'] . "'>" . $row['variantName'] . "</option>";
}
$conn->close();
