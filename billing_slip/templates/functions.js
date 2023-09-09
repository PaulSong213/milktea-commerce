import {
    formatDate
} from '/Zarate/costum-js/date.js'

export function showChargeSlip(salesID, appendToElement = null) {
    Swal.fire({
        title: 'Generating Print Report',
        html: 'Please Wait!', // add html attribute if you want or remove
        allowOutsideClick: false,
    });
    swal.showLoading();
    // fetch data from api 
    $.ajax({
        url: `/Zarate/API/sales/search.php?SalesID=${salesID}`,
        type: 'GET',
        success: function (data) {
            swal.close();
            const chargeSlip = JSON.parse(data);
            const slipNumber = chargeSlip.SalesID;

            const attachedToCharge = `${chargeSlip.RequestedEmployeeFirstName} ${chargeSlip.RequestedEmployeeMiddleName} ${chargeSlip.RequestedEmployeeLastName}`;

            var patientNameCharge = `${chargeSlip.PatientFirstName} ${chargeSlip.PatientMiddleName} ${chargeSlip.PatientLastName}`;

            // if patient is not registered, use unpaid patient name
            if (!chargeSlip.hospistalrecordNo) {
                patientNameCharge = chargeSlip.UnpaidPatientName;
            }

            var accountOf = patientNameCharge;
            if (chargeSlip.billingID) {
                accountOf = `${chargeSlip.AccountOfFirstName} ${chargeSlip.AccountOfMiddleName} ${chargeSlip.AccountOfLastName}`;
            }

            const date = chargeSlip.createDate;
            const productInfoStr = chargeSlip.ProductInfo;
            const chargeEnteredBy = `${chargeSlip.EnteredEmployeeFirstName} ${chargeSlip.EnteredEmployeeMiddleName} ${chargeSlip.EnteredEmployeeLastName}`;
            const totalAmount = chargeSlip.NetAmt;
            const ChangeAmt = chargeSlip.ChangeAmt;
            var remainingBalance = 0;
            if (parseFloat(ChangeAmt) < 0) {
                remainingBalance = parseFloat(ChangeAmt) * -1;
                $("#paidIndicator").text(`**Remaining Balance: ₱${remainingBalance}`);
                $("#paidIndicator").addClass("text-danger");
            }

            console.log(chargeSlip);

            if (!chargeSlip.billingID) {
                $("#billRef").remove();
            } else {
                $("#billRef").text(`Bill Reference: ${chargeSlip.billingID}`);
            }

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
            $('#accountOfCharge').text(accountOf);
            $('#patientNameCharge').text(patientNameCharge);
            $('#date').text(date);
            $('#chargeEnteredBy').text(chargeEnteredBy);
            $('#totalAmount').text(totalAmount);
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

                itemTypeContainers[itemTypeID]["total"] += Number(info.subtotal); // add subtotal to item type total
                var newProductInfo = $(`
                <div class="d-flex justify-content-end px-3">
                    <div class="row w-100">
                        <h6 class="col-6">${info.product_desciption}</h6>
                        <h6 class="col-2">₱${info.price}</h6>
                        <h6 class="col-1">${info.qty}</h6>
                        <h6 class="col-1">${info.unit}</h6>
                        <h6 class="col-2 text-end">₱${info.subtotal}</h6>
                    </div>
                </div>
                `);
                $(itemTypeContainers[itemTypeID]["element"]).append(newProductInfo);
            }

            // append item type containers to product info container
            for (const itemTypeID in itemTypeContainers) {
                if (Object.hasOwnProperty.call(itemTypeContainers, itemTypeID)) {
                    productInfoContainer.append(itemTypeContainers[itemTypeID]["element"]);
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
            $("#print-charge-slip").click(function () {
                printChargeSlip();
            });
        },
        error: function (error) {
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

    newWin.onload = function () {
        newWin.print();
        newWin.close();
    };
}

function printPaySlip(divToPrint) {
    var divToPrint = document.getElementById('pay-slip').outerHTML;
    var newWin = window.open('', '_blank');

    newWin.document.write('<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head><body>');
    newWin.document.write(divToPrint);
    newWin.document.write('</body></html>');

    newWin.document.close();

    newWin.onload = function () {
        newWin.print();
        newWin.close();
    };
}

export function showPaySlip(paymentID, appendToElement = null) {
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
        success: function (data) {
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
                
                `;
            } else {
                paymentDetails += `
                <span>Bank Name: ${paymentData.bankName}</span>
                <span>Check No.: ${paymentData.checkNo}</span>
                <span>Check Date: ${formatDate(new Date(paymentData.checkDate))}</span>
                <span>Check Amount: ₱${paymentData.checkAmount}</span>
                `;
            }
            paymentDetails += `<span>Change: ₱${paymentData.changeAmt}</span>`;
            $("#payDetails").html(paymentDetails);

            var chargeBillRequestURL = `/Zarate/API/sales/search.php?SalesID=${paymentData.chargeID}`;
            if (paymentData.type == "bill") chargeBillRequestURL = `/Zarate/API/billing/search.php?billingID=${paymentData.billID}`;

            // get more info of charge/bill
            $.ajax({
                url: chargeBillRequestURL,
                method: 'GET',
                success: function (chargeBillDataStr) {
                    swal.close();
                    const chargeBillData = JSON.parse(chargeBillDataStr);
                    console.log("chargeBillData", chargeBillData);

                    if (chargeBillData) {
                        $("#payPatientName").text(`${chargeBillData.PatientFirstName || chargeBillData.patientFirstName} ${chargeBillData.PatientMiddleName || chargeBillData.patientMiddleName} ${chargeBillData.PatientLastName || chargeBillData.patientLastName}`);

                        if (!chargeBillData.PatientFirstName || !chargeBillData.patientFirstName) {
                            $("#payPatientName").text(chargeBillData.UnpaidPatientName);
                        }

                        $("#payAccountOf").text(`${chargeBillData.AccountOfFirstName || chargeBillData.accountOfFirstName} ${chargeBillData.AccountOfMiddleName || chargeBillData.accountOfMiddleName} ${chargeBillData.AccountOfLastName || chargeBillData.accountOfLastName}`);

                        if (!chargeBillData.AccountOfFirstName || !chargeBillData.accountOfFirstName) {
                            $("#payAccountOf").text($("#payPatientName").text());
                        }
                    }

                    if (appendToElement) {
                        console.log($("#pay-slip-container"));
                        $(appendToElement).html("");
                        $(appendToElement).append($("#pay-slip-container").html());
                    } else {
                        var exampleModalPopup = new bootstrap.Modal($('#printPayModal'), {});
                        exampleModalPopup.show();
                    }
                    $("#print-pay-slip").click(function () {
                        printPaySlip();
                    });
                },
                error: function (error) {
                    swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'There was something wrong printing the report.',
                        text: error,
                    });
                }
            });
        },
        error: function (error) {
            swal.close();
            Swal.fire({
                icon: 'error',
                title: 'There was something wrong printing the report.',
                text: error,
            });
        }
    });
}

