<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<body>

    <div class="modal fade " data-bs-backdrop="static" id="printModal" tabindex="-1" aria-labelledby="printModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl bg-white">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Clinic Slip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border p-4 m-4 shadow">
                    <div id="charge-slip" class="bg-white">
                        <!-- HEADER -->
                        <div class="d-flex justify-content-between border-bottom border-5 border-secondary py-3 w-100 m-0">
                            <div class="d-flex">
                                <img style="height: 60px;" src="../img/logo.png" alt="ZARATE LOGO">
                                <div class="mx-3 d-flex flex-column justify-content-end ">
                                    <h5 class="fw-bold mb-1">E. Zarate Hospital</h5>
                                    <h6 class="text-muted">16 J. Aguilar Avenue, Talon, Las Piñas City, <br />Metro
                                        Manila, Philippines 1747</h6>
                                </div>
                            </div>
                            <div class="mx-2 d-flex flex-column">
                                <h5 class="fw-bold mb-1">Clinic Slip # <span id="slipNumber"></span> </h5>
                                <h6 class="text-muted mb-0"><span id="date"></span></h6>
                                <h6 class="text-muted">Entered by: <span id="enteredBy"></span></h6>
                            </div>
                        </div>

                        <!-- INFORMATION -->
                        <div class="py-3 ">
                            <div class="d-flex">
                                <div style="margin-right: 12px;">
                                    <h6 class="mb-1">ATTACHED TO: CLINIC USE</h6>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1"><span id="attachedTo"></span></h6>
                                </div>
                            </div>
                        </div>

                        <!-- ITEM LIST -->
                        <div id="productInfoContainer">
                            <!-- Product information will be dynamically populated here -->
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="border-top border-3 my-3 py-1 px-2 border-secondary w-max" style="min-width: 25%;">
                                <h5 class="fw-bold"><span id="totalAmount">0</span></h5>
                            </div>
                        </div>
                        <small class="fw-bold">*This receipt is provided for your reference and records. Please note that this is not an official receipt.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="print-charge-slip" type="button" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showChargeSlip(SalesID, appendToElement = null) {
            Swal.fire({
                title: 'Generating Print Report',
                html: 'Please Wait!', // add html attribute if you want or remove
                allowOutsideClick: false,
            });
            swal.showLoading();
            // fetch data from api 
            $.ajax({
                url: `/Zarate/API/ClinicUse/view.php?SalesID=${SalesID}`,
                type: 'GET',
                success: function(data) {
                    swal.close();
                    console.log(data);
                    const chargeSlip = data;
                    const slipNumber = chargeSlip.SalesID;

                    // if patient is not registered, use unpaid patient name

                    const date = chargeSlip.createDate;
                    const productInfoStr = chargeSlip.ProductInfo;
                    const totalAmount = chargeSlip.NetAmt;
                    var remainingBalance = 0;

                    console.log(chargeSlip);

                    if (!chargeSlip.SalesID) {
                        $("#SalesID").remove();
                    } else {
                        $("#SalesID").text(`Bill Reference: ${chargeSlip.SalesID}`);
                    }
                    $("#totalAmount").text(`Total Amount: ₱${chargeSlip.NetAmt}`);
                    // fill up the charge slip information
                    $('#slipNumber').text(slipNumber);
                    console.log($('#slipNumber'));
                    // $('#attachedToCharge').text(attachedToCharge);
                    $('#createDate').text(date);
                    $('#enteredBy').text(chargeSlip.EnteredBy);
                    $('#NetAmt').text(totalAmount);
                    //render product rows to productInfoContainer
                    var productInfo = JSON.parse(productInfoStr);
                    var productInfoContainer = $("#productInfoContainer");
                    var itemTypeContainers = {};
                    for (let i = 0; i < productInfo.length; i++) {
                        const info = productInfo[i];
                        if (!info.product_id) continue; // skip if product id is empty

                        var itemTypeID = info.itemTypeID;

                        // if item type id does not exist, create a new item type container
                        if (!itemTypeContainers[itemTypeID]) {
                            const containerElement = $(`
                                <div id="${itemTypeID}" class="mt-3">
                                    <div class="border border-3 d-flex  justify-content-between p-2 border-secondary w-100 align-items-center mb-2">
                                        <h6 class="fw-bold my-auto">${info.itemType}</h6>
                                        <div class="col-3 d-flex align-items-center justify-content-between">
                                            <h6 class="my-auto">TOTAL:</h6>
                                            <h6 class="my-auto" id="itemTypeTotal${itemTypeID}">0</h6>
                                        </div>
                                    </div>
                                </div>`);

                            itemTypeContainers[itemTypeID] = {
                                "total": 0,
                                "element": containerElement
                            };
                        }

                        itemTypeContainer = itemTypeContainers[itemTypeID]["element"]
                        itemTypeContainers[itemTypeID]["total"] += Number(info.subtotal); // add subtotal to item type total
                        var newProductInfo = $(`
                        <div class="d-flex justify-content-end px-3">
                            <div class="row w-100">
                                <h6 class="col-6">${info.product_id}</h6>
                                <h6 class="col-2">₱${info.price}</h6>
                                <h6 class="col-1">${info.qty}</h6>
                                <h6 class="col-1">${info.unit}</h6>
                                <h6 class="col-2 text-end">₱${info.subtotal}</h6>
                            </div>
                        </div>
                        `);
                        itemTypeContainer.append(newProductInfo);
                    }

                    // append item type containers to product info container
                    for (const itemTypeID in itemTypeContainers) {
                        if (Object.hasOwnProperty.call(itemTypeContainers, itemTypeID)) {
                            const itemTypeContainer = itemTypeContainers[itemTypeID]["element"];
                            productInfoContainer.append(itemTypeContainer);
                            $(`#itemTypeTotal${itemTypeID}`).text("₱" + itemTypeContainers[itemTypeID]["total"].toFixed(2));
                        }
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

        <?php
        if (isset($_SESSION['printSalesInsertedId'])) {
            $printSalesInsertedId = $_SESSION['printSalesInsertedId'];
            echo "showChargeSlip('$printSalesInsertedId');";
            unset($_SESSION['printSalesInsertedId']);
        }
        ?>

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
    </script>
</body>

</html>