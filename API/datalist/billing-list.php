<datalist id="billingList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM billing_tb LEFT JOIN patient_tb ON billing_tb.patientID = patient_tb.hospistalrecordNo ORDER BY `billingID` DESC";
    $billingresult = $conn->query($query);
    $billingsData = (object)array(); // Create an empty object

    while ($row = $billingresult->fetch_assoc()) {
        $BillingID = $row['billingID'];
        $date = $row['dateTimeAdmitted'];
        $type = $row['type'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];
        if (!isset($billingsData->$BillingID)) {
            $billingsData->$BillingID = (object)array(
                "id" => $BillingID,
                "data" => array()
            );
        }

        // Append the current data to the existing item type code
        $billingsData->$BillingID->data[] = $row;
        $patientFullName = $lname . ',' . $fname . ' ' . $mname;
        $billingValue = $type . " | No.: " . $BillingID;
        $billingInfo = $date . " - " . $patientFullName;

        echo "<option value='$billingValue'>$billingInfo</option>";
    }
    $billingsData = json_encode($billingsData);
    ?>
</datalist>
<?php $conn->close(); ?>