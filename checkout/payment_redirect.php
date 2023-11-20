<?php
// Include the connection file
require_once '../php/connect.php';
session_start();
// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_GET['orderId'])) {
    // Retrieve form data
    $orderId = $_GET['orderId'];

    // Prepare the SQL statement
    $query = "SELECT * FROM `orders_tb` WHERE `orderID` = $orderId";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orderID = $row["orderID"];
            $NetAmt = $row["NetAmt"];
            $orders = json_decode($row["ProductInfo"], true);
            $description = "";
            // loop though orders
            foreach ($orders as $order) {
                if (!$order) continue;
                $description = $description . $order['productName']  . " x " . $order['qty'];
                if ($order['addOns']) {
                    $description = $description . " with " . $order['addOns'];
                }
                $description = $description . ", ";
            }
            $costumerID = $row["CostumerID"];
            header("Location: ./payment.php?orderID=$orderID&NetAmt=$NetAmt&description=$description&costumerID=$costumerID");
            die();
        }
    }
} else {
    $_SESSION["alert_message"] = "Order ID did not exists";
    $_SESSION["alert_message_success"] = false;
    header("Location: /milktea-commerce/");
}
