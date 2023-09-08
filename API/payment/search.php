<?php
require_once '../../php/connect.php';
$conn = connect();
$paymentID = $_GET['paymentID'];

$query = "
SELECT paymentID,billID,chargeID,receivedID,dateTimePaid,payment_tb.modifiedDate,paymentType,type,cashAmountTendered,changeAmt,bankName,checkNo,checkDate, checkAmount,fname,lname,mname,title,position, 
IF(paymentType='cash', cashAmountTendered - changeAmt, checkAmount - changeAmt) AS paidAmt 
FROM payment_tb
LEFT JOIN
    employee_tb ON receivedID = employee_tb.DatabaseID
WHERE paymentID = '$paymentID'
";
$result = $conn->query($query);
if (!$result) {
    echo json_encode(["error" => $conn->error]);
    die();
}
$payment = $result->fetch_assoc();
echo json_encode($payment);
$conn->close();
