import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "itemTypeCode",
            label: "Item Type Code"
        },
        {
            dataKey: "description",
            label: "Description"
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

            if (viewData.dataKey === "is_consumable") data[viewData.dataKey] = data[viewData.dataKey] === "1" ? "Consumable" : "Not Consumable";

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