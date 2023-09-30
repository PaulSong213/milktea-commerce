<datalist id="VariantList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM product ";
    $variantResult = $conn->query($query);
    $chargeData = (object)array(); // Create an empty object

    while ($row = $variantResult->fetch_assoc()) {
        if (!isset($chargeData->$SalesID)) {
            $chargeData->$SalesID = (object)array(
                "id" => $SalesID,
                "data" => $row
            );
        }

        $patientFullName = $lname . ',' . $fname . ' ' . $mname;
        $chargeValue = $type . " | No.: " . $SalesID;

        echo "<option value='$chargeValue'>$patientFullName</option>";
    }
    $chargeData = json_encode($chargeData);
    ?>
</datalist>
<?php $conn->close(); ?>