import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {

    const viewDatas = [
        {
            dataKey: "DatabaseID",
            label: "Database ID"
        },
        {
            dataKey: "lname",
            label: "Last Name"
        },
        {
            dataKey: "fname",
            label: "First Name"
        },
        {
            dataKey: "mname",
            label: "Middle Name"
        },
        {
            dataKey: "nickName",
            label: "Nick Name"
        },
        {
            dataKey: "bDate",
            label: "Birth Date"
        },
        {
            dataKey: "createDate",
            label: "Created Date"
        },

        {
            dataKey: "title",
            label: "Title"
        },
        {
            dataKey: "position",
            label: "Position"
        },
        {
            dataKey: "sex",
            label: "Sex"
        },
        {
            dataKey: "department",
            label: "Department"
        },
        {
            dataKey: "dateStart",
            label: "Date Start"
        },
        {
            dataKey: "modifiedDate",
            label: "Modified Date"
        },
        {
            dataKey: "userName",
            label: "Email"
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
            if (viewData.dataKey === "Status") {
                console.log(data[viewData.dataKey]);
                const status = data[viewData.dataKey] == 1 ? "Active" : "Inactive";
                data[viewData.dataKey] = status;
            }
            if (viewData.label.includes("Date")) data[viewData.dataKey] = formatDate(new Date(data[viewData.dataKey]));
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