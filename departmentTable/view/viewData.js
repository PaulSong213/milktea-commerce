import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "departmentName",
            label: "Department Name"
        },
        {
            dataKey: "departmentDescription",
            label: "Department Description"
        },  
    ];
    table.on('click', '.view-btn', function (e) {
        let data = JSON.parse($(this).attr("data-item"));

        $("#viewModalBody").html("");
        for (let i = 0; i < viewDatas.length; i++) {
            const viewData = viewDatas[i];
            if (viewData.label.includes("Date")) data[viewData.dataKey] = formatDate(new Date(data[viewData.dataKey]));
            if (viewData.dataKey === "status") {
                console.log(data[viewData.dataKey]);
                const status = data[viewData.dataKey] == 1 ? "Active" : "Inactive";
                data[viewData.dataKey] = status;
            }
            $("#viewModalBody").append(`
                <div class="d-flex justify-content-between">
                    <h5>${viewData.label}:</h5>
                    <h5 class="fw-bold">${data[viewData.dataKey]}</h5>
                </div>
            `);
        }
        $('#viewItemModal').modal('show');
    });
}