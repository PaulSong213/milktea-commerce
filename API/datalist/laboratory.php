<html>
<datalist id="laboratorylist">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT inventory_tb.Description, itemtype_tb.itemTypeCode , inventory_tb.itemCode FROM inventory_tb LEFT JOIN itemtype_tb
    ON inventory_tb.itemTypeID = itemtype_tb.itemTypeID WHERE Status = 1 AND itemtype_tb.description = 'LABORATORY' ";
    $productsResult = $conn->query($query);
    $productsData = (object)array(); // Create an empty object
    while ($row = $productsResult->fetch_assoc()) {
        $itemCode = $row['itemCode'];
        $Description = $row['Description'];
        $itemTypeCode = $row['itemTypeCode'];

        if (!isset($productsData->$itemTypeCode)) {
            $productsData->$itemTypeCode = (object)array(
                "id" => $itemTypeCode,
                "data" => array()
            );
        }

        // Append the current data to the existing item type code
        $productsData->$itemTypeCode->data[] = $row;

        echo "<option value='$Description'>$itemTypeCode ||  $itemCode  </option>";
    }
    $productsData = json_encode($productsData);
    ?>
</datalist>
<?php $conn->close(); ?>

</html>