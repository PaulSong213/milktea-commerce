export function handleViewClick() {
    const viewDatas = [
        {
            dataKey: "EmployeeCode",
            label: "Employee Code"
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
            dataKey: "DatabaseID",
            label: "Databade ID"
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
            label: "User Name"
        },
            {
            dataKey: "password",
            label: "Password"
        },
            {
            dataKey: "Status",
            label: "Status"
        }

    ];
    $(".view-btn").on('click', function (event) {
        let data = JSON.parse($(this).attr("data-item"));
        $("#viewModalBody").html("");
        for (let i = 0; i < viewDatas.length; i++) {
            const viewData = viewDatas[i];
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