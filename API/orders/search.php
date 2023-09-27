<?php
require_once '../../php/connect.php';
$conn = connect();
$orderID = $_GET['orderID']; // Make sure to sanitize and validate user input

$query = "
SELECT
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
    ee.position AS EnteredEmployeePosition
FROM
    orders_tb ord
LEFT JOIN
    employee_tb ee ON ord.EnteredName = ee.DatabaseID
WHERE ord.orderID = '$orderID';
";

$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
