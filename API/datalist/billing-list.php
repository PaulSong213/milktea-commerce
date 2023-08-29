<datalist id="billingList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM billing_tb";
    $billingresult = $conn->query($query);
    $billingsData = (object)array(); // Create an empty object

    while ($row = $billingresult->fetch_assoc()) {
        $BillingID = $row['billingID'];
        $date = $row['dateTimeAdmitted'];
        $type = $row['type'];

        if (!isset($billingsData->$BillingID)) {
            $billingsData->$BillingID = (object)array(
                "id" => $BillingID,
                "data" => array()
            );
        }

        // Append the current data to the existing item type code
        $billingsData->$BillingID->data[] = $row;

        echo "<option value='$BillingID'>$type</option>";
    }
    $billingsData = json_encode($billingsData);
    ?>
</datalist>
<?php $conn->close(); ?>