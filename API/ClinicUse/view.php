<?php
// Set the response content type to JSON
header("Content-Type: application/json");

// Include the database connection code here
require_once '../../php/connect.php';
$conn = connect();

if (isset($_GET['SalesID'])) {
    // Retrieve sales data based on SalesID
    
    // Sanitize and validate user input
    $SalesID = $_GET['SalesID'];

    if (!is_numeric($SalesID)) {
        // Handle invalid input (e.g., return an error response)
        echo json_encode(["error" => "Invalid SalesID"]);
        exit; // Exit the script
    }

    // Use prepared statements to prevent SQL injection
    $query = "SELECT
        s.SalesID,
        s.ProductInfo,
        s.NetAmt,
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
        s.createDate,
        d.departmentID
    FROM
        clinicuse_tb s
    LEFT JOIN
        employee_tb er ON s.RequestedName = er.DatabaseID
    LEFT JOIN
        employee_tb ee ON s.EnteredName = ee.DatabaseID
    LEFT JOIN
        billing_tb b ON s.billingID = b.billingID
    WHERE s.SalesID = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $SalesID); // "i" represents an integer, adjust the data type if needed
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        // Handle the error gracefully
        echo json_encode(["error" => "Database query error"]);
    }

    $stmt->close();
} else {
    // Handle DataTables-based data retrieval
    
    $baseTable = "clinicuse_tb";

    // Define the base query
    $baseQuery = "SELECT * FROM $baseTable";

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
}

// Close the database connection
$conn->close();
?>
