<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                                <img style="height: 60px;" src="../img/logo.png" alt="ZARATE LOGO">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <script type="module">
        import {
            formatDate
        } from '/Zarate/costum-js/date.js'

        function showPaySlip(paymentID, appendToElement = null) {
            Swal.fire({
                title: 'Generating Print Report',
                html: 'Please Wait!', // add html attribute if you want or remove
                allowOutsideClick: false,
            });
            swal.showLoading();

            // fetch data from api 
            $.ajax({
                url: `/Zarate/API/payment/search.php?paymentID=${paymentID}`,
                type: 'GET',
                success: function(data) {
                    const paymentData = JSON.parse(data);
                    console.log(paymentData);
                    $("#paySlipNumber").text(paymentData.paymentID);
                    $("#payAmountPaid").text(`₱${paymentData.paidAmt}`);
                    $("#payDateTime").text(formatDate(new Date(paymentData.dateTimePaid)));
                    $("#receivedByPay").text(`${paymentData.fname} ${paymentData.mname}  ${paymentData.lname}`);
                    $("#printDate").text(formatDate(new Date()));
                    var billChargeNo = paymentData.chargeID;
                    if (paymentData.type === "bill") billChargeNo = paymentData.billID;
                    $("#payFor").text(`${paymentData.type.toUpperCase()} #${billChargeNo}`);
                    var paymentDetails = `<span>Mode of Payment: ${paymentData.paymentType.toUpperCase()}</span>`;
                    if (paymentData.paymentType == "cash") {
                        paymentDetails += `
                        <span>Amount Tendered: ₱${paymentData.cashAmountTendered}</span>
                        <span>Change: ₱${paymentData.changeAmt}</span>
                        `;
                    } else {
                        paymentDetails += `
                        <span>Bank Name: ${paymentData.bankName}</span>
                        <span>Check No.: ${paymentData.checkNo}</span>
                        <span>Check Date: ${formatDate(new Date(paymentData.checkDate))}</span>
                        <span>Check Amount: ₱${paymentData.paidAmt}</span>
                        `;
                    }


                    $("#payDetails").html(paymentDetails);

                    var chargeBillRequestURL = `/Zarate/API/sales/search.php?SalesID=${paymentData.chargeID}`;
                    if (paymentData.type == "bill") chargeBillRequestURL = `/Zarate/API/billing/search.php?billingID=${paymentData.billID}`;

                    // get more info of charge/bill
                    $.ajax({
                        url: chargeBillRequestURL,
                        method: 'GET',
                        success: function(chargeBillDataStr) {
                            swal.close();
                            const chargeBillData = JSON.parse(chargeBillDataStr);
                            console.log("chargeBillData", chargeBillData);

                            $("#payAccountOf").text(`${chargeBillData.AccountOfFirstName || chargeBillData.accountOfFirstName } ${chargeBillData.AccountOfMiddleName || chargeBillData.accountOfMiddleName} ${chargeBillData.AccountOfLastName || chargeBillData.accountOfLastName}`);

                            $("#payPatientName").text(`${chargeBillData.PatientFirstName || chargeBillData.patientFirstName} ${chargeBillData.PatientMiddleName || chargeBillData.patientMiddleName} ${chargeBillData.PatientLastName || chargeBillData.patientLastName}`);

                            if (appendToElement) {
                                console.log($("#pay-slip-container"));
                                $(appendToElement).html("");
                                $(appendToElement).append($("#pay-slip-container").html());
                            } else {
                                var exampleModalPopup = new bootstrap.Modal($('#printPayModal'), {});
                                exampleModalPopup.show();
                            }
                            $("#print-pay-slip").click(function() {
                                printPaySlip();
                            });
                        },
                        error: function(error) {
                            swal.close();
                            Swal.fire({
                                icon: 'error',
                                title: 'There was something wrong printing the report.',
                                text: error,
                            });
                        }
                    });
                },
                error: function(error) {
                    swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'There was something wrong printing the report.',
                        text: error,
                    });
                }
            });
        }

        <?php
        if (isset($_SESSION['printPaymentInsertedId'])) {
            $printPaymentInsertedId = $_SESSION['printPaymentInsertedId'];
            echo "showPaySlip(`" . $printPaymentInsertedId . "`)";
            unset($_SESSION['printPaymentInsertedId']);
        }
        ?>

        function printPaySlip() {
            var divToPrint = document.getElementById('pay-slip').outerHTML;
            var newWin = window.open('', '_blank');

            newWin.document.write('<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head><body>');
            newWin.document.write(divToPrint);
            newWin.document.write('</body></html>');

            newWin.document.close();

            newWin.onload = function() {
                newWin.print();
                newWin.close();
            };
        }
    </script>
</body>


</html>