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
    <div id="paymongoPay" class="d-none bg-white shadow rounded mx-auto mt-5 p-5" style="max-width: 50vw;">
        <div id="paymentLoader" class="d-flex flex-column align-items-center justify-content-center">
            <h2 style="color: #734006" class="mb-3 fw-bold text-center">PLEASE COMPLETE THE PAYMENT PROCEDURE <br /> ON THE OPENED TAB</h2>
            <img style="max-width: 400px;" src="../img/pay-wait.gif" alt="Waiting for Payment" />
            <p class="text-center fs-6 text-mute">Did not see the payment page?</p>
            <a id="open-pay-link-btn" target="_blank" class="btn btn-primary text-decoration-none" href="#">OPEN PAYMENT PAGE</a>
        </div>
        <div id="paymentSucceed" class="d-flex flex-column align-items-center justify-content-center d-none">
            <h2 class="mb-3 fw-bold text-center text-success">PAYMENT SUCCEED</h2>
            <img style="max-width: 400px;" src="../img/payment-success.png" alt="Waiting for Payment" />
            <a href="/milktea-commerce/" class="btn btn-success my-3 fs-5">TRACK ORDER NOW</a>
        </div>
    </div>
    <div id="gcashPay" class="d-none bg-white shadow rounded mx-auto mt-5 p-2 p-md-5 d-flex flex-column" style="width: 80vw; max-width: 700px">
        <h2 style="color: #734006" class="mb-3 fw-bold text-center">GCash Payment</h2>
        <img class="mx-auto" src="/milktea-commerce/gcash-qr.jpg" alt="GCash QR Code">
        <p class="text-center fw-bold">Scan the QR code above to pay</p>

        <div class="md:px-5">
            <form id="formGcashQR" action="/milktea-commerce/php/upload-receipt.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 ">
                    <input type="hidden" name="orderID" id="orderID" value="<?= $_GET["orderID"] ?>" class="form-control" readonly>
                </div>

                <div class="mb-3  w-100">
                    <label for="receipt" class="form-label">Upload Screenshot of Payment Receipt</label>
                    <input type="file" name="receipt" id="receipt" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="referenceNumber" class="form-label">Reference Number</label>
                    <input type="text" name="referenceNumber" id="referenceNumber" class="form-control" required placeholder="Enter Reference Number">
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Data</button>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="module">
    import {
        app,
        storage,

    } from "/milktea-commerce/costum-js/firebase.js";
    import {
        ref as sRef,
        uploadBytes,
        getDownloadURL
    } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-storage.js";

    import {
        getDatabase,
        ref,
        set,
        get
    } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";

    $(document).ready(function() {
        const COSTUMER_ID = <?= $costumer["costumerID"] ?>;
        const ORDER_ID = <?= $_GET["orderID"] ?>;
        <?php
        if (!isset($_GET["paymentID"])) {
            echo "checkPaymentMethod()";
        } else {
            echo "openPayLink('" . $_GET["paymentID"] . "');";
        }
        ?>

        function checkPaymentMethod() {
            createPayLink();
            // get(ref(getDatabase(), `/shop/paymentMode`)).then((snapshot) => {
            //     const paymentMode = snapshot.val();
            //     if (paymentMode === "paymongo") {
            //         createPayLink();
            //     } else {
            //         gcashQRPayment();
            //     }
            // }).catch((error) => {
            //     console.error(error);
            // });
        }

        function gcashQRPayment() {
            $("#gcashPay").removeClass("d-none");
            $("#formGcashQR").submit(function(e) {
                // Prevent the default form submission
                e.preventDefault();
                Swal.fire({
                    title: 'Uploading Payment Receipt',
                    text: 'Please wait...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                });

                // upload image to firebase storage
                const file = $("#receipt").prop("files")[0];
                const fileRef = sRef(storage, `${ORDER_ID}`);
                uploadBytes(fileRef, file).then((snapshot) => {
                    console.log("Uploaded a blob or file!");
                    // get the download url of the uploaded image
                    getDownloadURL(fileRef, `${ORDER_ID}`).then((url) => {
                        // save the url to the realtime database
                        const db = getDatabase();
                        const ORDER_KEY = ORDER_ID;
                        // save the reference number to the realtime database
                        const referenceNumber = $("#referenceNumber").val();
                        const newData = {
                            status: "gcash-proof-on-review",
                            sqlKey: ORDER_ID,
                            paymentID: referenceNumber,
                            proofOfPayment: url
                        };
                        set(ref(db, `/orders/${COSTUMER_ID}/${ORDER_KEY}`), newData)
                            .then(() => {
                                location.href = "/milktea-commerce/";
                            })
                            .catch((error) => {
                                alert(error);
                            });
                    }).catch((error) => {
                        alert(error);
                    });
                }).catch((error) => {
                    alert(error);
                });
            });
        }

        // create get request to create payment link
        function createPayLink() {
            const amount = Number(<?= $_GET["NetAmt"] ?>) * 100;
            $("#paymongoPay").removeClass("d-none");
            $.ajax({
                url: "/milktea-commerce/payment/create-pay-link.php",
                type: "GET", //send it through get method
                data: {
                    orderNo: ORDER_ID,
                    amount: amount,
                    description: '<?= $_GET["description"] ?>',
                    remarks: ""
                },
                success: function(data) {
                    var response = JSON.parse(data);
                    var data = response.data;
                    console.log(data);

                    set(ref(getDatabase(), `/orders/${COSTUMER_ID}/${ORDER_ID}`), {
                            status: "pending-payment",
                            sqlKey: ORDER_ID,
                            paymentID: data.id,
                        })
                        .then(() => {
                            const payURL = data.attributes.checkout_url;
                            window.open(payURL, '_blank');
                            watchPaymentSuccess(data.id);
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
                        } else {
                            console.log("Payment is not yet successful");
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseText);
                    }
                });
            }, 1000);
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
                    paymentID: paymentLinkID,
                    orderID: ORDER_ID
                },
                success: function() {
                    const db = getDatabase();
                    const ORDER_KEY = ORDER_ID;
                    // mark the order as on-queue in firebase realtime database
                    set(ref(db, `/orders/${COSTUMER_ID}/${ORDER_KEY}/status`), "on-queue")
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