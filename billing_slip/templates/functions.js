import {
    formatDate
} from '/milktea-commerce/costum-js/date.js'

export function showChargeSlip(salesID, appendToElement = null) {
    Swal.fire({
        title: 'Generating Print Report',
        html: 'Please Wait!', // add html attribute if you want or remove
        allowOutsideClick: false,
    });
    swal.showLoading();
    // fetch data from api 
    $.ajax({
        url: `/milktea-commerce/API/orders/search.php?orderID=${salesID}`,
        type: 'GET',
        success: function (data) {
            swal.close();
            const chargeSlip = JSON.parse(data);
            const slipNumber = chargeSlip.SalesID;
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
                $("#productInfoList").append(`
                    <div class="d-flex justify-content-between">
                        <span>${product.product_id} x ${product.qty} ${product.unit}</span>
                        <span>${product.subtotal}</span>
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
        url: `/milktea-commerce/API/payment/search.php?paymentID=${paymentID}`,
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

            var chargeBillRequestURL = `/milktea-commerce/API/sales/search.php?SalesID=${paymentData.chargeID}`;
            if (paymentData.type == "bill") chargeBillRequestURL = `/milktea-commerce/API/billing/search.php?billingID=${paymentData.billID}`;

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

