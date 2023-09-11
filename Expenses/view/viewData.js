import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "expenseType",
            label: "Type"
        },
        {
            dataKey: "departmentName",
            label: "Department"
        },
        {
            dataKey: "amount",
            label: "Amount"
        },
        {
            dataKey: "payableTo",
            label: "Payable to"
        },
        {
            dataKey: "reason",
            label: "Reason"
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
            dataKey: "note",
            label: "Note"
        },

        {
            dataKey: "dateEntered",
            label: "Date Entered"
        },
        {
            dataKey: "datePost",
            label: "Date Post"
        }
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