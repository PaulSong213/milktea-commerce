import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "itemTypeCode",
            label: "Item Type"
        },
        {
            dataKey: "itemCode",
            label: "Item Code"
        },
        {
            dataKey: "UnitType",
            label: "Unit Type"
        },
        {
            dataKey: "Unit",
            label: "Unit"
        },
        {
            dataKey: "Description",
            label: "Description"
        },
        {
            dataKey: "Generic",
            label: "Generic"
        },
        {
            dataKey: "SugPrice",
            label: "Sugprice"
        },
        {
            dataKey: "MWprice",
            label: "MWprice"
        },
        {
            dataKey: "IPDprice",
            label: "IPDprice"
        },
        {
            dataKey: "Ppriceuse",
            label: "Ppriceuse"
        },
        {
            dataKey: "Status",
            label: "Status"
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
            if (viewData.dataKey === "Status") {
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