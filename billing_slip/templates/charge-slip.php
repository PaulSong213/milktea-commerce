<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="modal fade" data-bs-backdrop="static" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Order Reference</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="charge-slip-container" class="modal-body border p-4 m-4 shadow">
                    <div id="charge-slip">
                        <!-- HEADER -->
                        <div class=" d-flex flex-column text-center ">
                            <h5 class="fw-bold mb-1">Romeo's Cafe</h5>
                            <h6 class="fw-bold mb-1">Order # <span id="slipNumber"></span> </h6>
                            <h6 class="text-muted mb-0"><span id="date"></span></h6>
                            <h6 class="text-muted">Entered by: <span id="chargeEnteredBy"></span></h6>
                        </div>

                        <!-- ITEM LIST -->
                        <div id="productInfoContainer">
                            <div class="d-flex justify-content-between border-bottom border-3 border-secondary pt-2 pb-1">
                                <span class="fw-bold">Item</span>
                                <span class="fw-bold">Price</span>
                            </div>
                            <div id="productInfoList">
                                <!-- <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Item</span>
                                    <span class="fw-bold">Quantity</span>
                                    <span class="fw-bold">Price</span>
                                </div> -->
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="border-top border-3 my-3 py-1 px-2 border-secondary w-max text-end" style="min-width: 25%;">
                                <span class="fw-bold">Total Amount: ₱<span id="totalAmount">0</span></span>
                                <div class="d-flex flex-column">
                                    <span id="AmtTendered">Amount Tendered: ₱</span>
                                    <span id="ChangeAmt">Change: ₱</span>
                                    <span id="NetAmt">Net Amount: ₱</span>
                                    <span id="NetSale">Net Sale: ₱</span>
                                    <span id="AddDisc">Additional Discount(%): </span>
                                </div>
                            </div>
                        </div>
                        <small style="font-size: 10px;">*This Order Reference is given for your convenience and documentation purposes. Please be aware that it is not an official receipt.</small>
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
    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <script type="module">
        import {
            showChargeSlip
        } from "/milktea-commerce/billing_slip/templates/functions.js";
        <?php
        if (isset($_SESSION['printSalesInsertedId'])) {
            $printSalesInsertedId = $_SESSION['printSalesInsertedId'];
            echo "showChargeSlip(`" . $printSalesInsertedId . "`)";
            unset($_SESSION['printSalesInsertedId']);
        }
        ?>
    </script>
</body>


</html>