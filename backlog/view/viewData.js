import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
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
            dataKey: "position",
            label: "Position"
        }, 
        {
            dataKey: "title",
            label: "Title"
        },
        {
            dataKey: "departmentName",
            label: "Department"
        },
        {
            dataKey: "action",
            label: "Action"
        },
        {
            dataKey: "description",
            label: "Description"
        },
        {
            dataKey: "timeStamp",
            label: "Time Stamp"
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