import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        {
            dataKey: "supplier_name",
            label: "Supplier Name"
        },
        {
            dataKey: "address",
            label: "Address"
        },
        {
            dataKey: "telNum",
            label: "Telephone No"
        },
        {
            dataKey: "faxNum",
            label: "Fax Number"
        },
        {
            dataKey: "contactNo",
            label: "Contact No"
        },
        {
            dataKey: "CelNum",
            label: "Cellphone No"
        },
        {
            dataKey: "Snote",
            label: "Supplier Note"
        },
        {
            dataKey: "status",
            label: "Status"
        },
        {
            dataKey: "createDate",
            label: "Create Date"
        },
        {
            dataKey: "modifiedDate",
            label: "Modified Date"
        }
        
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