<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
    <div class="modal fade" data-bs-backdrop="static" id="printPayModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Payment Slip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="pay-slip-container" class="modal-body border p-4 m-4 shadow">
                    <div id="pay-slip">
                        <!-- HEADER -->
                        <div class="d-flex justify-content-between border-bottom border-5 border-secondary py-3 w-100 m-0">
                            <div class="d-flex">
                                <img style="height: 60px;" src="/milktea-commerce/img/logo.png" alt="ZARATE LOGO">
                                <div class="mx-3 d-flex flex-column justify-content-end ">
                                    <h5 class="fw-bold mb-1">E. Zarate Hospital</h5>
                                    <h6 class="text-muted">16 J. Aguilar Avenue, Talon, Las Piñas City, <br />Metro Manila, Philippines 1747</h6>
                                </div>
                            </div>
                            <div class="mx-2 d-flex flex-column">
                                <h5 class="fw-bold mb-1">Payment Slip # <span id="paySlipNumber"></span> </h5>
                            </div>
                        </div>

                        <!-- INFORMATION -->
                        <div class="py-3 border-bottom border-5 border-secondary">
                            <h6>This is to acknowledge receipt of payment, detailed as follows</h6>
                            <div class="d-flex ps-5">
                                <div style="margin-right: 12px;">
                                    <h6 class="mb-1">AMOUNT PAID:</h6>
                                    <h6 class="mb-1">DATE / TIME PAID:</h6>
                                    <h6 class="mb-1">PAYMENT FOR:</h6>
                                    <h6 class="mb-1">ACCOUNT OF:</h6>
                                    <h6 class="mb-1">PATIENT NAME:</h6>
                                    <h6 class="mb-1">PAYMENT DETAILS:</h6>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" id="payAmountPaid"></h6>
                                    <h6 class="fw-bold mb-1" id="payDateTime"></h6>
                                    <h6 class="fw-bold mb-1" id="payFor"></h6>
                                    <h6 class="fw-bold mb-1" id="payAccountOf"></h6>
                                    <h6 class="fw-bold mb-1" id="payPatientName"></h6>
                                    <h6 class="fw-bold mb-1 d-flex flex-column" id="payDetails"></h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3 align-items-end">
                                <h6>Print Date: <span id="printDate"></span></h6>
                                <div style="min-width: 25%;">
                                    <h6>PAYMENT RECEIVED BY:</h6>
                                    <div class="border-bottom border-3 border-dark" style="height: 35px;"></div>
                                    <span id="receivedByPay" class="text-uppercase fw-bold text-center w-100 d-block"></span>
                                </div>
                            </div>
                        </div>
                        <!-- NOTE -->
                        <small class="d-block mt-3 w-75" style="text-align: justify;">NOTE: This payment acknowledgement slip is invalid if not signed by the authorized clinic personnel as named above, or if succeeded by a later printed acknowledgement slip with the same reference.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="print-pay-slip" type="button" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <script type="module">
        import {
            showPaySlip
        } from '/milktea-commerce/billing_slip/templates/functions.js';

        <?php
        if (isset($_SESSION['printPaymentInsertedId'])) {
            $printPaymentInsertedId = $_SESSION['printPaymentInsertedId'];
            echo "showPaySlip(`" . $printPaymentInsertedId . "`)";
            unset($_SESSION['printPaymentInsertedId']);
        }
        ?>
    </script>
</body>

</html>