<?php session_start(); ?>
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
        </div>
        <div id="paymentSucceed" class="d-flex flex-column align-items-center justify-content-center d-none">
            <h2 class="mb-3 fw-bold text-center text-success">PAYMENT SUCCEED</h2>
            <img style="max-width: 400px;" src="../img/payment-success.png" alt="Waiting for Payment" />
            <a href="/milktea-commerce/" class="btn btn-success my-3 fs-5">TRACK ORDER NOW</a>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
        // create get request to create payment link
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
                        console.log(data);
                        if (data.attributes.status == "paid") {
                            clearInterval(paymentWatch);
                            $("#paymentSucceed").removeClass("d-none");
                            $("#paymentLoader").remove();
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseText);
                    }
                });
            }, 5000);

        }
    });
</script>

</html>