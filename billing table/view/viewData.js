import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "AddDisc",
            label: "Add Discount"
        },
        {
            dataKey: "AddDiscAmt",
            label: "Add Discount Amount"
        },
        {
            dataKey: "AmtTendered",
            label: "Amount Tendered"
        },
        {
            dataKey: "ChangeAmt",
            label: "Change Amount"
        },
        {
            dataKey: "createDate",
            label: "Create Date"
        },
        {
            dataKey: "EnteredName",
            label: "Entered Name"
        },
        {
            dataKey: "NetAmt",
            label: "Net Amount"
        },
        {
            dataKey: "NetSale",
            label: "Net Sale"
        },
        {
            dataKey: "PatientAcct",
            label: "Patient Account"
        },
        {
            dataKey: "ProductInfo",
            label: "Product Information"
        },
        {
            dataKey: "RequestedName",
            label: "Requested Name"
        },
        {
            dataKey: "Subtotal",
            label: "Sub Total"
        },
    ];
    table.on('click', '.view-btn', function (e) {
        let data = JSON.parse($(this).attr("data-item"));
        $("#viewModalBody").html("");

        for (let i = 0; i < viewDatas.length; i++) {
            const viewData = viewDatas[i];
            if (viewData.label.includes("Date")) data[viewData.dataKey] = formatDate(new Date(data[viewData.dataKey]));
            $("#viewModalBody").append(`
                <div class="d-flex justify-content-between">
                    <h5 class="mx-2">${viewData.label}:</h5>
                    <h5 class="fw-bold">${data[viewData.dataKey] || "None"}</h5>
                </div>
            `);
        }
        $('#viewItemModal').modal('show');
    });
}