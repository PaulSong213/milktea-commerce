<?php
require_once '../../php/connect.php';
$conn = connect();
$billingID = $_GET['billingID']; // Make sure to sanitize and validate user input

$query = "
SELECT
b.billingID,
b.dateTimeAdmitted,
b.type,
b.dateTimeDischarged,
e1.DatabaseID AS encoderDatabaseID,
e1.lname AS encoderLastName,
e1.fname AS encoderFirstName,
e1.mname AS encoderMiddleName,
e1.title AS encoderTitle,
e1.position AS encoderPosition,
p.hospistalrecordNo AS patientHospitalRecordNo,
p.lname AS patientLastName,
p.fname AS patientFirstName,
p.mname AS patientMiddleName,
e2.DatabaseID AS attendingPhysicianDatabaseID,
e2.lname AS attendingPhysicianLastName,
e2.fname AS attendingPhysicianFirstName,
e2.mname AS attendingPhysicianMiddleName,
e2.title AS attendingPhysicianTitle,
e2.position AS attendingPhysicianPosition,
e3.DatabaseID AS admittingPhysicianDatabaseID,
e3.lname AS admittingPhysicianLastName,
e3.fname AS admittingPhysicianFirstName,
e3.mname AS admittingPhysicianMiddleName,
e3.title AS admittingPhysicianTitle,
e3.position AS admittingPhysicianPosition
FROM
billing_tb b
JOIN
employee_tb e1 ON b.encoderID = e1.DatabaseID
JOIN
patient_tb p ON b.patientID = p.hospistalrecordNo
JOIN
employee_tb e2 ON b.attendingPhysicianID = e2.DatabaseID
JOIN
employee_tb e3 ON b.admittingPhysicianID = e3.DatabaseID
WHERE b.billingID = '$billingID'
;";

$result = $conn->query($query);
$billingData = null;

if ($result) {
    $billingData = $result->fetch_assoc();
} else {
    echo json_encode(["error" => $conn->error]);
}

$queryCharge = "
SELECT * FROM sales_tb WHERE billingID = '$billingID';
";

$resultCharge = $conn->query($queryCharge);

while ($row = $resultCharge->fetch_assoc()) {
    $billingData['charges'][] = $row;
}

echo json_encode($billingData);



$conn->close();
