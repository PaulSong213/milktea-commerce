<?php
// Include the connection file
require_once '../../php/connect.php';
session_start();
// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST['orders'])) {
    // Retrieve form data
    $orderStr = $_POST['orders'];
    $orders = json_decode($orderStr, true);
    $shippingAddress = $_POST['shippingAddress'];
    $paymentMethod = $_POST['paymentMethod'];
    $status = "pending-payment";
    $NetSale = 0; // without deduction
    $AddDisc = 0;
    $AddDiscAmt = 0;
    $NetAmt = 0; // Amount after deduction of discount
    $AmtTendered = 0;
    $ChangeAmt = 0;
    $EnteredName = 0;
    $costumerID = $_POST['costumerID'];
    $deliveryMethod = $_POST['deliveryMethod'];

    if ($paymentMethod == "cash-on-delivery") {
        $status = "on-queue";
    }
    $description = "";
    // loop though orders
    foreach ($orders as $order) {
        if (!$order) continue;
        $NetAmt += $order['subTotal'];
        $NetSale += $order['subTotal'];
        $description = $description . $order['productName']  . " x " . $order['qty'];
        if ($order['addOns']) {
            $description = $description . " with " . $order['addOns'];
        }
        $description = $description . ", ";
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO `orders_tb` (`ProductInfo`, `CostumerID`, `PaymentID`, `modeOfPayment`, `status`, `NetSale`, `AddDisc`, `AddDiscAmt`, `NetAmt`, `AmtTendered`, `ChangeAmt`, `EnteredName`, `CostumerName`,`shippingAddress`,`deliveryMethod`) 
    VALUES ( '$orderStr', $costumerID, '', '$paymentMethod', '$status', $NetSale, $AddDisc, $AddDisc, $NetAmt, $AmtTendered, $ChangeAmt, '0', '',' $shippingAddress','$deliveryMethod');";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {

        // Get the ID of the newly inserted record
        $orderID = $conn->insert_id;

        // Redirect to the appropriate page if the form was submitted
        $_SESSION["alert_message"] = "Order submitted successfully";
        $_SESSION["alert_message_success"] = true;
        if ($paymentMethod == "cash-on-delivery") {
            echo '
            <body style="background-color: #d5c0ac">
                <h3 class="text-align: center;margin-top: 30px; width: 100vw;">PROCESSING PLEASE WAIT</h3>
            <body>
            <script type="module">
            import {
                app
            } from "/milktea-commerce/costum-js/firebase.js";
        
            import {
                getDatabase,
                ref,
                set
            } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
            const db = getDatabase();
            const ORDER_KEY = ' . $orderID . ';
            const COSTUMER_ID = ' . $costumerID . ';
            set(ref(db, `/orders/${COSTUMER_ID}/${ORDER_KEY}`), {
                    status: "on-queue",
                    sqlKey : ORDER_KEY,
                    paymentID: "cash-on-delivery",
                })
                .then(() => {
                    window.location.href = "/milktea-commerce/";
                })
                .catch((error) => {
                    alert(error);
                });

            </script>
            ';
            die();
        } else {
            // redirect to checkout page
            header("Location: ../../checkout/payment.php?orderID=$orderID&NetAmt=$NetAmt&description=$description&costumerID=$costumerID");
            die();
        }
    } else {
        // Redirect to the appropriate page if the form was not submitted
        $_SESSION["alert_message"] = "Failed to submit form data";
        $_SESSION["alert_message_error"] = true;
        header("Location: ../../index.php");
        die();
    }
} else {
    // Redirect to the appropriate page if the form was not submitted
    $_SESSION["alert_message"] = "Failed to submit form data";
    $_SESSION["alert_message_error"] = true;
    header("Location: ../../index.php");
    die();
}
