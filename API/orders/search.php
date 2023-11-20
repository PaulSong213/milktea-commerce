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
    ord.isPaid,
    ord.deliveryMethod,
    cc.costumerID AS costumerID,
    cc.lastName AS costumerLastName,
    cc.firstName AS costumerFirstName
FROM
    orders_tb ord
LEFT JOIN
    costumer_tb cc ON ord.CostumerID = cc.costumerID
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
