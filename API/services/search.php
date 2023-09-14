<?php
require_once '../../php/connect.php';
$conn = connect();
$serviceID = $_GET['serviceID']; // Make sure to sanitize and validate user input

$query = "SELECT 
transID, Services, services_tb.departmentID,RequestedName as requestedEmployeeID, PatientName as patientID, remarks,ChargeNo,EnteredBy,WorkingDx,ChiefComplaint,reason,
services_tb.date AS transactionDate, services_tb.modifiedDate,services_tb.dateTimeCollection,
dept.departmentID AS departmentID,
dept.departmentDescription AS departmentDescription,
dept.departmentName AS departmentName, 
er.DatabaseID AS requestedEmployeeID,
er.lname AS requestedEmployeeLastName,
er.fname AS requestedEmployeeFirstName,
er.mname AS requestedEmployeeMiddleName,
er.title AS requestedEmployeeTitle,
er.position AS RequestedEmployeePosition,
p.hospistalrecordNo AS patientHospitalRecordNo,
p.lname AS patientLastName,
p.fname AS patientFirstName,
p.mname AS patientMiddleName,
p.bDate AS patientBDate,
p.gender AS patientGender,
p.age AS patientAge
FROM services_tb
LEFT JOIN 
    department_tb dept ON services_tb.departmentID = dept.departmentID
LEFT JOIN 
    employee_tb er ON services_tb.RequestedName = er.DatabaseID
LEFT JOIN
patient_tb p ON services_tb.PatientName = p.hospistalrecordNo
WHERE transID = '$serviceID'";

$result = $conn->query($query);
if ($result) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => $conn->error]);
}
