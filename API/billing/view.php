<?php
// Set the response content type to JSON
header("Content-Type: application/json");

// Include the database connection code here
require_once '../../php/connect.php';
$conn = connect();
$baseTable = "billing_tb";
// Define the base query
$baseQuery = "SELECT
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
employee_tb e3 ON b.admittingPhysicianID = e3.DatabaseID";

// Retrieve DataTables' request parameters
$start = $_POST['start']; // Start index for pagination
$length = $_POST['length']; // Number of records to fetch
$searchValue = $_POST['search']['value']; // Search value
$columns = $_POST['columns']; // Column information
$order = $_POST['order']; // Sorting order

// Build the SQL query based on search value and sorting
$query = $baseQuery;
if (!empty($searchValue)) {
    $query .= " WHERE billingID LIKE '%$searchValue%' 
    OR type LIKE '%$searchValue%' 
    OR patientFirstName LIKE '%$searchValue%'
    OR patientLastName LIKE '%$searchValue%'
    "; // Add more columns as needed
}

// Sorting
if (!empty($order)) {
    $columnIdx = $order[0]['column'];
    if ($columns[$columnIdx]['data']) {
        $columnName = $columns[$columnIdx]['data'];
        $columnDir = $order[0]['dir'];
        $query .= " ORDER BY $columnName $columnDir";
    }
}

// Add the limit condition for all cases
$query .= " LIMIT $start, $length";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if ($result === false) {
    die("Query failed: " . $conn->error); // Add error handling
}

// Fetch data and convert to JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// If not searching, get the total records for pagination
if (empty($searchValue)) {
    $totalRecords = $conn->query("SELECT COUNT(*) AS total FROM $baseTable")->fetch_assoc()['total'];
} else {
    $totalRecords = count($data); // Set total records to the number of search results
}

// Construct the JSON response
$response = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
);

// Output the JSON response
echo json_encode($response);

// Close the database connection
$conn->close();
