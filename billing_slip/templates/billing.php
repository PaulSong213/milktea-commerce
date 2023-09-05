<!doctype html>
<html lang="en">

<body>
    <div class="modal fade" data-bs-backdrop="static" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-center">
                        <h5 class="modal-title" id="printModalLabel">Print Billing</h5>
                        <button class="mx-2 btn btn-primary" id="print-charge-slip-header" type="button">Print</button>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="charge-slip-container" class="modal-body border p-4 m-4 shadow">
                    <div id="charge-slip">
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
                                <h5 class="fw-bold mb-1">Bill # <span id="slipNumber"></span> </h5>
                                <h6 class="text-muted mb-0"><span id="date"></span></h6>
                                <h6 class="text-muted">Entered by: <span id="enteredBy"></span></h6>
                            </div>
                        </div>

                        <!-- INFORMATION -->
                        <div class="py-3 row">
                            <div class="d-flex col">
                                <div style="margin-right: 12px;">
                                    <h6 class="mb-1">Patient:</h6>
                                    <h6 class="mb-1">Account of:</h6>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1"><span id="patientName"></span></h6>
                                    <h6 class="fw-bold mb-1"><span id="accountOfPrint"></span></h6>
                                </div>
                            </div>
                            <div class="d-flex col">
                                <div style="margin-right: 12px;">
                                    <h6 class="mb-1">Admitting Physician:</h6>
                                    <h6 class="mb-1">Attending Physician:</h6>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1"><span id="admittingPhysician"></span></h6>
                                    <h6 class="fw-bold mb-1"><span id="attendingPhysician"></span></h6>
                                </div>
                            </div>
                        </div>

                        <!-- chargeInfoContainer -->
                        <div id="chargeInfoContainer"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="print-charge-slip" type="button" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function showBill(billingID, appendToElement = null) {
            try {
                Swal.fire({
                    title: 'Generating Print Report',
                    html: 'Please Wait!',
                    allowOutsideClick: false,
                });
                swal.showLoading();

                const response = await $.ajax({
                    url: `/Zarate/API/billing/search.php?billingID=${billingID}`,
                    type: 'GET',
                });

                swal.close();
                const bill = JSON.parse(response);

                $("#slipNumber").text(bill.billingID);
                $("#enteredBy").text(`${bill.encoderFirstName} ${bill.encoderMiddleName} ${bill.encoderLastName}`);
                $("#patientName").text(`${bill.patientFirstName} ${bill.patientMiddleName} ${bill.patientLastName}`);
                $("#accountOfPrint").text(`${bill.accountOfFirstName} ${bill.accountOfMiddleName} ${bill.accountOfLastName}`);
                $("#admittingPhysician").text(`${bill.admittingPhysicianFirstName} ${bill.admittingPhysicianMiddleName} ${bill.admittingPhysicianLastName}`);
                $("#attendingPhysician").text(`${bill.attendingPhysicianFirstName} ${bill.attendingPhysicianMiddleName} ${bill.attendingPhysicianLastName}`);

                $("#chargeInfoContainer").html("<h6 class='fw-bold mt-3 mb-2 text-uppercase'>Charge Slips Summary</h6>");

                for (let i = 0; i < bill.charges.length; i++) {
                    const chargeSlip = bill.charges[i];
                    renderChargeSlip(chargeSlip);
                }

                if (appendToElement) {
                    $(appendToElement).html("");
                    $(appendToElement).append($("#charge-slip-container").html());
                } else {
                    var exampleModalPopup = new bootstrap.Modal($('#printModal'), {});
                    exampleModalPopup.show();
                }

                $("#print-charge-slip, #print-charge-slip-header").click(function() {
                    printChargeSlip();
                });
                return bill;
            } catch (error) {
                console.error(error);
                swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'There was something wrong printing the report.',
                    text: error,
                });
            }
        }


        function renderChargeSlip(chargeSlip) {
            const slipNumber = chargeSlip.SalesID;
            const productInfoStr = chargeSlip.ProductInfo;
            $("#patientType").text(`Patient Type: ${chargeSlip.PatientType}`);
            $("#AmtTendered").text(`Amount Tendered: ₱${chargeSlip.AmtTendered}`);
            $("#ChangeAmt").text(`Change: ₱${ chargeSlip.ChangeAmt >= 0  ? chargeSlip.ChangeAmt : 0}`);
            $("#NetAmt").text(`Net Amount: ₱${chargeSlip.NetAmt}`);
            $("#NetSale").text(`Net Sale: ₱${chargeSlip.NetSale}`);
            $("#AddDisc").text(`Additional Discount(%): ${chargeSlip.AddDisc}`);

            //render product rows to chargeInfoContainer
            var productInfo = JSON.parse(productInfoStr);
            var chargeInfoContainer = $("#chargeInfoContainer");

            const chargeInfoElement = $(`
                <div class="mb-1  border border-dark border-3 p-2">
                    <div class="p-2 row">
                        <div class="d-flex col">
                            <div style="margin-right: 12px;">
                                <h6 class="mb-1">Charge Slip #:</h6>
                                <h6 class="mb-1">Date:</h6>
                                <h6 class="mb-1">Entered by:</h6>
                            </div>
                            <div>
                                <h6 class="mb-1"><span id="chargeSlip_${slipNumber}">${slipNumber}</span></h6>
                                <h6 class="mb-1"><span id="date_${slipNumber}">${chargeSlip.createDate}</span></h6>
                                <h6 class="mb-1"><span id="enteredBy_${slipNumber}">${chargeSlip.EnteredEmployeeFirstName} ${chargeSlip.EnteredEmployeeMiddleName} ${chargeSlip.EnteredEmployeeLastName}</span></h6>
                            </div>
                        </div>
                        <div class="d-flex col">
                            <div style="margin-right: 12px;">
                                <h6 class="mb-1">Total:</h6>
                                <h6 class="mb-1">Amount Tendered:</h6>
                                <h6 class="mb-1 fw-bold">Remaining Balance:</h6>
                                <small class="mb-1">Change:</small>
                            </div>
                            <div>
                                <h6 class="mb-1">₱${chargeSlip.NetAmt}</h6>
                                <h6 class="mb-1">₱${chargeSlip.AmtTendered}</h6>
                                <h6 class="fw-bold mb-1">₱${chargeSlip.remainingBalance}</h6>
                                <small class="mb-1">₱${chargeSlip.ChangeAmt}</small>
                            </div>
                        </div>
                    </div>
                </div>
                `);
            var itemTypeContainers = {};
            for (let i = 0; i < productInfo.length; i++) {
                const info = productInfo[i];
                if (!info.product_id) continue; // skip if product id is empty

                var itemTypeID = info.itemTypeID;

                // if item type id does not exist, create a new item type container
                if (!itemTypeContainers[itemTypeID]) {

                    const containerElement = $(`
                        <div id="${itemTypeID}" class="ps-5">
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
                        <div class="d-flex justify-content-end px-3 ms-3">
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

            // append the charge info element
            chargeInfoContainer.append(chargeInfoElement);

            // append item type containers to product info container
            for (const itemTypeID in itemTypeContainers) {
                if (Object.hasOwnProperty.call(itemTypeContainers, itemTypeID)) {
                    const itemTypeContainer = itemTypeContainers[itemTypeID]["element"];
                    chargeInfoElement.append(itemTypeContainer);
                    $(`#itemTypeTotal${itemTypeID}`).text("₱" + itemTypeContainers[itemTypeID]["total"].toFixed(2));
                }
            }
        }

        <?php
        if (isset($_SESSION['printSalesInsertedId'])) {
            $printSalesInsertedId = $_SESSION['printSalesInsertedId'];
            echo "showBill(`" . $printSalesInsertedId . "`)";
            unset($_SESSION['printSalesInsertedId']);
        }
        ?>

        function printChargeSlip() {
            var divToPrint = document.getElementById('charge-slip').innerHTML;
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