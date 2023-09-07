import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "SalesID",
            label: "Clinic Use ID"
        },
        {
            dataKey: "department",
            label: "Department"
        },
        {
            dataKey: "NetAmt",
            label: "Net Amount"
        },
        {
            dataKey: "enteredBy",
            label: "Entered By"
        },
        {
            dataKey: "requestedBy",
            label: "Requested By"
        },
        {
            dataKey: "createDate",
            label: "Create Date"
        },
        {
            dataKey: "ProductInfo",
            label: "Product Info"
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