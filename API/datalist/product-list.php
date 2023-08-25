<html>
<datalist id="productList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT inventory_tb.itemCode, itemtype_tb.itemTypeCode FROM inventory_tb LEFT JOIN itemtype_tb ON inventory_tb.itemTypeID = itemtype_tb.itemTypeID WHERE Status = 1 ";
    $productsResult = $conn->query($query);
    $productsData = (object)array(); // Create an empty object
    while ($row = $productsResult->fetch_assoc()) {
        $itemCode = $row['itemCode'];
        $itemTypeCode = $row['itemTypeCode'];
        
        if (!isset($productsData->$itemTypeCode)) {
            $productsData->$itemTypeCode = (object)array(
                "id" => $itemTypeCode,
                "data" => array()
            );
        }

        // Append the current data to the existing item type code
        $productsData->$itemTypeCode->data[] = $row;

        echo "<option value='$itemCode'>$itemTypeCode</option>";
    }
    $productsData = json_encode($productsData);
    ?>
</datalist>
<?php $conn->close(); ?>
</html>
