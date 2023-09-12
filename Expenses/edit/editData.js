export function handleEditClick(table) {
    table.on('click', '.edit-btn', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "expenseType",
                inputName: "Expense Type"
            },
            {
                dataKey: "departmentName",
                inputName: "department"
            },
            {
                dataKey: "amount",
                inputName: "amount"
            },
            {
                dataKey: "payable",
                inputName: "payable"
            },
            {
                dataKey: "docRef",
                inputName: "docRef"
            },
            {
                dataKey: "reason",
                inputName: "reason"
            },
            {
                dataKey: "enteredBy",
                label: "enteredBy"
            },
            {
                dataKey: "requestedBy",
                label: "requestedBy"
            },
            {
                dataKey: "note",
                inputName: "Note"
            }
        ];

        // fill up the fields
        for (let i = 0; i < toFillUpDatas.length; i++) {
            const toFillUpData = toFillUpDatas[i];
            $(`[name="${toFillUpData.inputName}"]`).val(data[toFillUpData.dataKey]);
        }

        // edit the save button
        const saveButton = $("[name='SaveItem']");
        saveButton.text("Edit Expenses");

        // edit header title
        const headerTitle = $("#addItemModalLabel");
        headerTitle.text("Edit Expenses");

        const addItemForm = $("#addItemForm");
        const addItemFormAction = addItemForm.attr("action");
        addItemForm.attr("action", "./edit/editfunction.php");
        addItemForm.append(`<input type="hidden" name="itemTypeID" value="${data['itemTypeID']}">`);

        // watch modal close then reset data
        addModal.on("hidden.bs.modal", function () {
            headerTitle.text("Add Item");
            saveButton.text("Add Item");
            addItemForm.attr("action", addItemFormAction);
            addItemForm.find("input[name='item_id']").remove();
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });
    });
}