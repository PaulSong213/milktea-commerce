<datalist id="chargeList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT PatientAcct,SalesID,NetSale,NetAmt,ChangeAmt,AmtTendered,PatientType,patient_tb.fname,patient_tb.lname,patient_tb.mname 
    FROM sales_tb 
    LEFT JOIN patient_tb 
    ON sales_tb.PatientAcct = patient_tb.hospistalrecordNo
    ORDER BY `SalesID` DESC
    ";
    $billingresult = $conn->query($query);
    $chargeData = (object)array(); // Create an empty object

    while ($row = $billingresult->fetch_assoc()) {
        $SalesID = $row['SalesID'];
        $type = $row['PatientType'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];
        $row["remainingBalance"] = $row["NetAmt"] - $row["AmtTendered"];
        if ($row["remainingBalance"] <= 0) {
            $row["remainingBalance"] = 0;
        }
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