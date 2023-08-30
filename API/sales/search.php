<?php
require_once '../../php/connect.php';
$conn = connect();
$SalesID = $_GET['SalesID']; // Make sure to sanitize and validate user input

$query = "
SELECT
    s.SalesID,
    s.ProductInfo,
    s.NetSale,
    s.AddDisc,
    s.AddDiscAmt,
    s.NetAmt,
    s.AmtTendered,
    s.ChangeAmt,
    s.PatientAcct,
    s.UnpaidPatientName,
    p.hospistalrecordNo,
    p.lname AS PatientLastName,
    p.fname AS PatientFirstName,
    p.mname AS PatientMiddleName,
    s.RequestedName,
    er.DatabaseID AS RequestedEmployeeID,
    er.lname AS RequestedEmployeeLastName,
    er.fname AS RequestedEmployeeFirstName,
    er.mname AS RequestedEmployeeMiddleName,
    er.title AS RequestedEmployeeTitle,
    er.position AS RequestedEmployeePosition,
    s.EnteredName,
    ee.DatabaseID AS EnteredEmployeeID,
    ee.lname AS EnteredEmployeeLastName,
    ee.fname AS EnteredEmployeeFirstName,
    ee.mname AS EnteredEmployeeMiddleName,
    ee.title AS EnteredEmployeeTitle,
    ee.position AS EnteredEmployeePosition,
    s.billingID,
    s.PatientType,
    s.createDate,
    b.billingID AS BillingID,
    b.accountOfID,
    acc.hospistalrecordNo AS AccountOfHospitalRecordNo,
    acc.lname AS AccountOfLastName,
    acc.fname AS AccountOfFirstName,
    acc.mname AS AccountOfMiddleName
FROM
    sales_tb s
LEFT JOIN
    patient_tb p ON s.PatientAcct = p.hospistalrecordNo
LEFT JOIN
    employee_tb er ON s.RequestedName = er.DatabaseID
LEFT JOIN
    employee_tb ee ON s.EnteredName = ee.DatabaseID
LEFT JOIN
    billing_tb b ON s.billingID = b.billingID
LEFT JOIN
    patient_tb acc ON b.accountOfID = acc.hospistalrecordNo 
WHERE s.SalesID = '$SalesID';
";

$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
