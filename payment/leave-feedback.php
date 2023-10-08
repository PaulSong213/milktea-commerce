<?php

// check if user is logged in
require_once("../php/auth.php");
$costumer = allowCostumerOnly();
if (!$costumer) {
    echo "User is not logged in";
    http_response_code(422);
    exit();
}

// check if parameters are set
if (
    !isset($_POST['ratingStars'])
    || !isset($_POST['feedback'])
    || !isset($_POST['orderNo'])
) {
    echo "Parameters are not set properly";
    http_response_code(422);
    exit();
}

// initialize variables
$ratingStars = $_POST['ratingStars'];
$feedback = $_POST['feedback'];
$orderNo = $_POST['orderNo'];
require_once '../php/connect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = connect();

// insert feedback into mysql database
$sqlInsertFeedback = "INSERT INTO feedback_tb
    SET
        SalesID = '$orderNo',
        ratingStars = '$ratingStars',
        feedback = '$feedback';
    ";

$resultInsertFeedback = mysqli_query($conn, $sqlInsertFeedback);
if (!$resultInsertFeedback) {
    echo "Failed to insert feedback into database";
    http_response_code(500);
    exit();
}


// mark sales status as delivered in mysql database
$sqlUpdateSales = "UPDATE sales_tb
    SET
        status = 'delivered'
    WHERE
        SalesID = '$orderNo';
    ";

$resultUpdateSales = mysqli_query($conn, $sqlUpdateSales);
if (!$resultUpdateSales) {
    echo "Failed to update sales table";
    http_response_code(500);
    exit();
}

// set session variable for success transaction
$_SESSION["alert_message"] = "THANK YOU FOR YOUR FEEDBACK! WE HOPE TO SEE YOU AGAIN!";
$_SESSION["alert_message_success"] = true;
?>

<script type="module">
    // mark order status as delivered in firebase database
    const COSTUMER_ID = <?= $costumer["costumerID"] ?>;
    import {
        app
    } from "/milktea-commerce/costum-js/firebase.js";

    import {
        getDatabase,
        ref,
        set
    } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
    set(ref(getDatabase(), `/orders/${COSTUMER_ID}/${<?= $orderNo ?>}/status`), "delivered")
        .then(() => {
            // redirect page to home page
            window.location.replace("/milktea-commerce/");
        })
        .catch((error) => {
            alert("Error updating status:", error);
        });;
</script>