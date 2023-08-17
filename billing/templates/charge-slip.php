<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        #charge-slip {
            /* set font for receipt */
            font-family: 'Courier New', Courier, monospace;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="modal fade" data-bs-backdrop="static" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Charge Slip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m-2 border p-2 shadow">
                        <div id="charge-slip" class="p-3 ">
                            <h4 class="fw-bold">
                                E. Zarate Hospital
                            </h4>
                            <h4 class="fw-bold">
                                <span>Charge Slip Number:</span>
                                <span id="slipNumber"></span>
                            </h4>
                            <hr />
                            <div class="w-100 row">
                                <div class="col-8 d-flex">
                                    <!-- Render attached to, account of, and patient name-->
                                    <div class="d-flex flex-column">
                                        <span>ATTACHED TO:</span>
                                        <span>ACCOUNT OF:</span>
                                        <span>PATIENT NAME:</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span id="attachedTo" class="mx-2"></span>
                                        <span id="accountOf" class="mx-2"></span>
                                        <span id="patientName" class="mx-2"></span>
                                    </div>
                                </div>
                                <div class="col-4 d-flex">
                                    <div class="d-flex flex-column">
                                        <span>DATE:</span>
                                        <span>ENTERED BY:</span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span id="date" class="mx-2"></span>
                                        <span id="enteredBy" class="mx-2"></span>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex flex-column" id="productInfoContainer">
                                <!-- <div class="row">
                                <div class="col-7">
                                    <span>Item 1</span>
                                </div>
                                <div class="col-5">
                                    <div class="row">
                                        <span class="col">
                                            1 test
                                        </span>
                                        <span class="col text-end">
                                            ₱350.00
                                        </span>
                                        <span class="col text-end">
                                            ₱350.00
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            </div>
                            <hr />
                            <div class="d-flex justify-content-end">
                                <span class="mx-5">Total Amount: ----></span>
                                <span class="fw-bold" id="totalAmmount">₱350.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="print-charge-slip" type="button" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function showChargeSlip(slipNumber, attachedTo, accountOf, patientName, date, enteredBy, totalAmmount, productInfoStr) {

            // fill up the charge slip information
            $('#slipNumber').text(slipNumber);
            $('#attachedTo').text(attachedTo);
            $('#accountOf').text(accountOf);
            $('#patientName').text(patientName);
            $('#date').text(date);
            $('#enteredBy').text(enteredBy);
            $('#totalAmmount').text(totalAmmount);

            // render product rows to productInfoContainer
            var productInfo = JSON.parse(productInfoStr);
            var productInfoContainer = $("#productInfoContainer");
            for (let i = 0; i < productInfo.length; i++) {
                const info = productInfo[i];
                var newProductInfo = $(`
                    <div class="row">
                        <div class="col-7">
                            <span>${info['product_id']}</span>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <span class="col">
                                    ${info['qty']}
                                </span>
                                <span class="col text-end">
                                    ₱${info['disc_amt']}
                                </span>
                                <span class="col text-end">
                                    ₱${info['subtotal']}
                                </span>
                            </div>
                        </div>
                    </div>
                    `);
                productInfoContainer.append(newProductInfo);
            }
            var exampleModalPopup = new bootstrap.Modal($('#printModal'), {});
            exampleModalPopup.show();
            $("#print-charge-slip").click(function() {
                printChargeSlip();
            });
        }
        showChargeSlip('0001', 'John Doe', 'John Doe', 'John Doe', '2021-07-01', 'John Doe', '₱350.00', '[{"product_id":"dawd","qty":"1","price":"100","disc_percent":"0","disc_amt":"0.00", "subtotal":"100.00"}]');

        function printChargeSlip() {
            var divToPrint = document.getElementById('charge-slip');
            var newWin = window.open(divToPrint, 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 10);
        }
    </script>
</body>


</html>