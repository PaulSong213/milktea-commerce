<?php
// Set the response content type to JSON
header("Content-Type: application/json");

// Include the database connection code here
require_once '../../php/connect.php';
$conn = connect();

$baseTable = "orders_tb";

// Define the base query
$baseQuery = "SELECT 
    ord.orderID,
    ord.ProductInfo,
    ord.NetSale,
    ord.AddDisc,
    ord.AddDiscAmt,
    ord.NetAmt,
    ord.AmtTendered,
    ord.ChangeAmt,
    ord.CostumerName,
    ord.EnteredName,
    ord.createDate,
    ord.status,
    ord.modeOfPayment,
    ord.PaymentID,
    ee.DatabaseID AS EnteredEmployeeID,
    ee.lname AS EnteredEmployeeLastName,
    ee.fname AS EnteredEmployeeFirstName,
    ee.mname AS EnteredEmployeeMiddleName,
    ee.title AS EnteredEmployeeTitle,
    ee.position AS EnteredEmployeePosition,
    ct.firstName AS CostumerLastName,
    ct.lastName AS CostumerFirstName
FROM 
    orders_tb ord
LEFT JOIN
    employee_tb ee ON ord.EnteredName = ee.DatabaseID
LEFT JOIN
    costumer_tb ct ON ord.CostumerID = ct.costumerID
";

// Retrieve DataTables' request parameters
$start = $_POST['start']; // Start index for pagination
$length = $_POST['length']; // Number of records to fetch
$searchValue = $_POST['search']['value']; // Search value

// Build the SQL query based on search value
$query = $baseQuery;
if (!empty($searchValue)) {
    $query .= " WHERE
    orderID LIKE '%$searchValue%' OR
    CostumerName LIKE '%$searchValue%' OR
    modeOfPayment LIKE '%$searchValue%' OR
    EnteredEmployeeFirstName LIKE '%$searchValue%' OR
    EnteredEmployeeLastName LIKE '%$searchValue%'
";

    if (isset($_GET['modeOfPaymentType'])) {
        $modeOfPaymentType = $_GET['modeOfPaymentType'];
        if ($modeOfPaymentType == "online") {
            $query .= " AND modeOfPayment NOT 'walk-in'";
        } else {
            $query .= " AND modeOfPayment = 'walk-in'";
        }
    }
} else if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == "delivered") {
        $query .= "WHERE ord.status = 'delivered'";
    }
}

// Add the limit condition for all cases
$query .= " 
ORDER BY orderID DESC
LIMIT $start, $length";
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
