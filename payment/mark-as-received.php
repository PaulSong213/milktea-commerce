<?php

// check if user is logged in
require_once("../php/auth.php");
$costumer = allowCostumerOnly();
if (!$costumer) {
    echo "User is not logged in";
    http_response_code(422);
    exit();
}

// check if the parameter orderNo is set
if (!isset($_GET['orderNo'])) {
    echo "orderNo is not set";
    http_response_code(422);
    exit();
}

$orderNo = $_GET['orderNo'];

// modify sales table status to delivered
require_once '../php/connect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = connect();

$sql = "UPDATE orders_tb
    SET
        status = 'delivered'
    WHERE
        orderID = '$orderNo';
    ";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Failed to update sales table";
    http_response_code(500);
    exit();
}

$_SESSION["OPENED_ORDER_NO"] = $orderNo;
?>

<script type="module">
    const COSTUMER_ID = <?= $costumer["costumerID"] ?>;
    import {
        app
    } from "/milktea-commerce/costum-js/firebase.js";

    import {
        getDatabase,
        ref,
        set
    } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
    set(ref(getDatabase(), `/orders/${COSTUMER_ID}/${<?= $orderNo ?>}/status`), "waiting-for-feedback")
        .then(() => {
            window.location.replace("/milktea-commerce/");
        })
        .catch((error) => {
            alert("Error updating status:", error);
        });;
</script>