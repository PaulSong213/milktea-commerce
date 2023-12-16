<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                            <h6 class="text-muted d-none">Entered by: <span id="chargeEnteredBy"></span></h6>
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
                                <div class="d-flex flex-column d-none">
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
            formatDate
        } from '/milktea-commerce/costum-js/date.js'
        window.formatDate = formatDate;
    </script>
    <script>
        function showChargeSlip(orderID, appendToElement = null) {
            Swal.fire({
                title: 'Generating Print Report',
                html: 'Please Wait!', // add html attribute if you want or remove
                allowOutsideClick: false,
            });
            swal.showLoading();
            // fetch data from api 
            $.ajax({
                url: `/milktea-commerce/API/orders/search.php?orderID=${orderID}`,
                type: 'GET',
                success: function(data) {
                    swal.close();
                    const chargeSlip = JSON.parse(data);
                    const slipNumber = chargeSlip.orderID;
                    const attachedToCharge = `${chargeSlip.RequestedEmployeeFirstName} ${chargeSlip.RequestedEmployeeMiddleName} ${chargeSlip.RequestedEmployeeLastName}`;

                    const date = chargeSlip.createDate;
                    const productInfoStr = chargeSlip.ProductInfo;
                    const chargeEnteredBy = `${chargeSlip.EnteredEmployeeFirstName} ${chargeSlip.EnteredEmployeeMiddleName} ${chargeSlip.EnteredEmployeeLastName}`;
                    const totalAmount = chargeSlip.NetAmt;
                    const ChangeAmt = chargeSlip.ChangeAmt;

                    $("#patientType").text(`Patient Type: ${chargeSlip.PatientType}`);
                    $("#AmtTendered").text(`Amount Tendered: ₱${chargeSlip.AmtTendered}`);
                    $("#ChangeAmt").text(`Change: ₱${chargeSlip.ChangeAmt >= 0 ? chargeSlip.ChangeAmt : 0}`);
                    $("#NetAmt").text(`Net Amount: ₱${chargeSlip.NetAmt}`);
                    $("#NetSale").text(`Net Sale: ₱${chargeSlip.NetSale}`);
                    $("#AddDisc").text(`Additional Discount(%): ${chargeSlip.AddDisc}`);

                    // fill up the charge slip information
                    $('#slipNumber').text(slipNumber);
                    console.log($('#slipNumber'));
                    $('#attachedToCharge').text(attachedToCharge);
                    $('#date').text(date);
                    $('#chargeEnteredBy').text(chargeEnteredBy);
                    $('#totalAmount').text(totalAmount);

                    //render product rows to productInfoContainer
                    var productInfo = JSON.parse(productInfoStr);
                    console.log("productInfo", productInfo);
                    for (let i = 0; i < productInfo.length; i++) {
                        const product = productInfo[i];
                        console.log(product);
                        $("#productInfoList").append(`
                            <div class="d-flex justify-content-between">
                                <span>${product.productName} x ${product.qty} ${product.size}</span>
                                <span>${product.subTotal}</span>
                            </div>
                        `);
                    }


                    if (appendToElement) {
                        console.log($("#charge-slip-container"));
                        $(appendToElement).html("");
                        $(appendToElement).append($("#charge-slip-container").html());
                    } else {
                        var exampleModalPopup = new bootstrap.Modal($('#printModal'), {});
                        exampleModalPopup.show();
                    }
                    $("#print-charge-slip").click(function() {
                        printChargeSlip();
                    });
                },
                error: function(error) {
                    console.log(error);
                    console.log(error);
                    swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'There was something wrong printing the report.',
                        text: error,
                    });
                }
            });
        }

        function printChargeSlip() {
            var divToPrint = document.getElementById('charge-slip').outerHTML;
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