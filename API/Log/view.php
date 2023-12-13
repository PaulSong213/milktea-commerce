<?php
// Set the response content type to JSON
header("Content-Type: application/json");

// Include the database connection code here
require_once '../../php/connect.php';

// Function to handle database connection
function connectToDatabase()
{
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$conn = connectToDatabase();

$baseTable = "backlog_tb";

// Define the base query
$baseQuery = "SELECT * FROM $baseTable 
    LEFT JOIN employee_tb ON employee_tb.DatabaseID = $baseTable.employeeID
    LEFT JOIN department_tb ON department_tb.departmentID = employee_tb.departmentID";

// Retrieve DataTables' request parameters
$start = isset($_POST['start']) ? $_POST['start'] : 0; // Start index for pagination
$length = isset($_POST['length']) ? $_POST['length'] : 10; // Number of records to fetch
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : ''; // Search value

// Build the SQL query based on search value
$query = $baseQuery;
if (!empty($searchValue)) {
    $query .= " WHERE 
        backlogID LIKE ? OR
        description LIKE ? OR
        lname LIKE ? OR
        fname LIKE ? OR
        position LIKE ? OR
        timeStamp LIKE ? OR
        departmentName LIKE ?";

    // Add more columns as needed

    // Prepare the query with placeholders
    $stmt = $conn->prepare($query);

    // Bind parameters
    $searchPattern = "%$searchValue%";
    $stmt->bind_param("sssssss", $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern, $searchPattern);

    // Execute the query
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();
} else {
    // If not searching, use the original query
    $query .= " ORDER BY backlogID DESC LIMIT ?, ?";

    // Prepare the query with placeholders
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bind_param("ii", $start, $length);

    // Execute the query
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Close the statement
    $stmt->close();
}

// Fetch data and convert to JSON
$data = $result->fetch_all(MYSQLI_ASSOC);

// If not searching, get the total records for pagination
if (empty($searchValue)) {
    $totalRecords = $conn->query("SELECT COUNT(*) AS total FROM $baseTable")->fetch_assoc()['total'];
} else {
    $totalRecords = count($data); // Set total records to the number of search results
}

// Construct the JSON response
$response = array(
    "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
);

// Output the JSON response
echo json_encode($response);

// Close the database connection
$conn->close();
