import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "SalesID",
            label: "Sales ID"
        },
        {
            dataKey: "ProductInfo",
            label: "Product Cart"
        },
        {
            dataKey: "NetSale",
            label: "NetSale"
        },
        {
            dataKey: "AddDisc",
            label: "AddDisc"
        },
        {
            dataKey: "NetAmt",
            label: "NetAmt"
        },
        {
            dataKey: "AmtTendered",
            label: "AmtTendered"
        },
        {
            dataKey: "ChangeAmt",
            label: "ChangeAmt"
        },
        {
            dataKey: "PatientAcct",
            label: "PatientAcct"
        },
        {
            dataKey: "RequestedName",
            label: "RequestedName"
        },
        {
            dataKey: "EnteredName",
            label: "EnteredName"
        },
        
        {
            dataKey: "PatientType",
            label: "PatientType"
        },
        
        {
            dataKey: "UnpaidPatientName",
            label: "UnpaidPatientName"
        },
        {
            dataKey: "createDate",
            label: "Created Date"
        },
        {
            dataKey: "modifiedDate",
            label: "Modified Date"
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