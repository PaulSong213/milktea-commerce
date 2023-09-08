<?php
// Set the response content type to JSON
header("Content-Type: application/json");

// Include the database connection code here
require_once '../../php/connect.php';
$conn = connect();

$baseTable = "backlog_tb";

// Define the base query
$baseQuery = "SELECT * FROM $baseTable 
LEFT JOIN employee_tb
ON employee_tb.DatabaseID = $baseTable.employeeID
LEFT JOIN department_tb ON department_tb.departmentID = employee_tb.departmentID
";

// Retrieve DataTables' request parameters
$start = $_POST['start']; // Start index for pagination
$length = $_POST['length']; // Number of records to fetch
$searchValue = $_POST['search']['value']; // Search value

// Build the SQL query based on search value
$query = $baseQuery;
if (!empty($searchValue)) {
    $query .= " WHERE backlogID LIKE '%$searchValue%' 
    OR description LIKE '%$searchValue%'
    OR lname LIKE '%$searchValue%'
    OR fname LIKE '%$searchValue%'
    OR position LIKE '%$searchValue%'
    OR timeStamp LIKE '%$searchValue%'     
    OR departmentName LIKE '%$searchValue%'"; // Add more columns as needed
}

// Add the limit condition for all cases
$query .= " LIMIT $start, $length";

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
    "draw" => intval($_POST['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
);

// Output the JSON response
echo json_encode($response);

// Close the database connection
$conn->close();
