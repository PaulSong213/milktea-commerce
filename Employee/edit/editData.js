export function handleEditClick(table) {
    
    table.on('click', '.edit-btn', function (e) {
        const adminModal = $("#AdminPassModal");
        adminModal.modal('show');
        const addModal = $("#addItemModal");
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "lname",
                inputName: "employee_lname"
            },
            {
                dataKey: "fname",
                inputName: "employee_fname"
            },
            {
                dataKey: "mname",
                inputName: "employee_mname"
            },
            {
                dataKey: "nickName",
                inputName: "employee_nickname"
            },
            {
                dataKey: "bDate",
                inputName: "employee_bdate"
            },
            {
                dataKey: "maritalStatus",
                inputName: "marital"
            },
            {
                dataKey: "sex",
                inputName: "sex"
            },
            {
                dataKey: "department",
                inputName: "dept"
            },
            {
                dataKey: "title",
                inputName: "title"
            },
            {
                dataKey: "position",
                inputName: "position"
            },
            {
                dataKey: "dateStart",
                inputName: "employee_sdate"
            },
            {
                dataKey: "userName",
                inputName: "email"
            },
            {
                dataKey: "password",
                inputName: "Password"
            },
            {
                dataKey: "password",
                inputName: "CPassword"
            },
        ];

        // fill up the fields
        for (let i = 0; i < toFillUpDatas.length; i++) {
            const toFillUpData = toFillUpDatas[i];
            $(`[name="${toFillUpData.inputName}"]`).val(data[toFillUpData.dataKey]);
        }

        // edit the save button
        const saveButton = $("[name='SaveItem']");
        saveButton.text("Edit Employee Information");

        // edit header title
        const headerTitle = $("#addItemModalLabel");
        headerTitle.text("Edit Employee");

        const addItemForm = $("#addItemForm");
        
        addItemForm.attr("action", "./edit/editfunction.php");
        addItemForm.append(`<input type="hidden" name="item_id" value="${data['DatabaseID']}">`);

        // watch modal close then reset data
        addModal.on("hidden.bs.modal", function () {
            headerTitle.text("Add Item");
            saveButton.text("Add Item");
            addItemForm.attr("action", "addfunction.php");
            addItemForm.find("input[name='item_id']").remove();
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });

        adminModal.on("hidden.bs.modal", function () {
            
            addModal.modal('show');
        });
    });
}
