<?php session_start();
require_once("../php/auth.php");
$costumer = allowCostumerOnly();
if (!$costumer) {
    header("Location: /milktea-commerce/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background-color: #f7f7f7;">
    <div class=" bg-white shadow rounded mx-auto mt-5 p-5" style="max-width: 50vw;">
        <div id="paymentLoader" class="d-flex flex-column align-items-center justify-content-center">
            <h2 style="color: #734006" class="mb-3 fw-bold text-center">PLEASE COMPLETE THE PAYMENT PROCEDURE <br /> ON THE OPENED TAB</h2>
            <img style="max-width: 400px;" src="../img/pay-wait.gif" alt="Waiting for Payment" />
            <a id="open-pay-link-btn" target="_blank" class="btn btn-primary text-decoration-none" href="#">OPEN PAYMENT PAGE</a>
        </div>
        <div id="paymentSucceed" class="d-flex flex-column align-items-center justify-content-center d-none">
            <h2 class="mb-3 fw-bold text-center text-success">PAYMENT SUCCEED</h2>
            <img style="max-width: 400px;" src="../img/payment-success.png" alt="Waiting for Payment" />
            <a href="/milktea-commerce/" class="btn btn-success my-3 fs-5">TRACK ORDER NOW</a>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="module">
    import {
        app
    } from "/milktea-commerce/costum-js/firebase.js";

    import {
        getDatabase,
        ref,
        set
    } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";

    $(document).ready(function() {
        const COSTUMER_ID = <?= $costumer["costumerID"] ?>;
        <?php
        if (!isset($_GET["paymentID"])) {
            echo "createPayLink();";
        } else {
            echo "openPayLink('" . $_GET["paymentID"] . "');";
        }
        ?>
        // create get request to create payment link
        function createPayLink() {
            $.ajax({
                url: "/milktea-commerce/payment/create-pay-link.php",
                type: "GET", //send it through get method
                data: {
                    amount: 10000,
                    description: "Milk Tea",
                    remarks: "Milk Tea"
                },
                success: function(data) {
                    var response = JSON.parse(data);
                    var data = response.data;
                    console.log(data);
                    const payURL = data.attributes.checkout_url;
                    window.open(payURL, '_blank');
                    watchPaymentSuccess(data.id);
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        }

        function watchPaymentSuccess(paymentLinkID) {
            // every 5 seconds, check if payment is successful
            const paymentWatch = setInterval(function() {
                $.ajax({
                    url: "/milktea-commerce/payment/retrieve-pay-link.php",
                    type: "GET", //send it through get method
                    data: {
                        pay_link_id: paymentLinkID
                    },
                    success: function(data) {
                        var response = JSON.parse(data);
                        var data = response.data;
                        if (data.attributes.status == "paid") {
                            clearInterval(paymentWatch);
                            markAsPaid(paymentLinkID);
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseText);
                    }
                });
            }, 5000);
        }

        function openPayLink(paymentLinkID) {
            $.ajax({
                url: "/milktea-commerce/payment/retrieve-pay-link.php",
                type: "GET", //send it through get method
                data: {
                    pay_link_id: paymentLinkID
                },
                success: function(data) {
                    var response = JSON.parse(data);
                    var data = response.data;
                    if (data.attributes.status == "paid") {
                        markAsPaid(paymentLinkID);
                    } else {
                        paymentLinkID = data.id;
                        $("#open-pay-link-btn").attr("href", data.attributes.checkout_url);
                        window.open(data.attributes.checkout_url, '_blank');
                        watchPaymentSuccess(paymentLinkID);
                    }
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        }

        function markAsPaid(paymentLinkID) {
            $.ajax({
                url: "/milktea-commerce/payment/mark-as-paid.php",
                type: "GET", //send it through get method
                data: {
                    paymentID: paymentLinkID
                },
                success: function(SalesID) {
                    console.log(SalesID);
                    const db = getDatabase();
                    const ORDER_KEY = SalesID;
                    // mark the order as preparing-food in firebase realtime database
                    set(ref(db, `/orders/${COSTUMER_ID}/${ORDER_KEY}/status`), "preparing-food")
                        .then(() => {
                            $("#paymentLoader").addClass("d-none");
                            $("#paymentSucceed").removeClass("d-none");
                        })
                        .catch((error) => {
                            alert(error);
                        });
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        }
    });
</script>

</html>