<?php
// Set the response content type to JSON
header("Content-Type: application/json");

// Include the database connection code here
require_once '../../php/connect.php';
$conn = connect();

$baseTable = "patient_tb";

// Define the base query
$baseQuery = "SELECT fname , lname , mname , hospistalrecordNo,age,bDate,gender,maritalStatus, address FROM $baseTable";

// Retrieve DataTables' request parameters
$start = 0; // Start index for pagination
if (isset($_POST['start'])) $start = $_POST['start']; // Start index for pagination

$length = 0;
if (isset($_POST['length'])) $length = $_POST['length']; // Number of records to fetch

$searchValue = ""; // Search value
if (isset($_POST['search']['value'])) {
    $searchValue = $_POST['search']['value']; // Search value
}

// Build the SQL query based on search value
$query = $baseQuery;
if (!empty($searchValue)) {
    $query .= " WHERE itemTypeCode LIKE '%$searchValue%' 
    OR description LIKE '%$searchValue%' 
    OR departmentName LIKE '%$searchValue%'"; // Add more columns as needed
}

if ($length > 0 && $start > 0) {
    // Add the limit condition for all cases
    $query .= " LIMIT $start, $length";
}

// Execute the query
$result = $conn->query($query);

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
    "draw" => intval(isset($_POST['draw']) ? $_POST['draw'] : 0),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
);

// Output the JSON response
echo json_encode($response);

// Close the database connection
$conn->close();
