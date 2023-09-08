export function handleEditClick(table) {
    table.on('click', '.edit-btn', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "expenseType",
                label: "expenseType"
            },
            {
                dataKey: "department",
                label: "department"
            },
            {
                dataKey: "amount",
                label: "amount"
            },
            {
                dataKey: "payable",
                label: "payable"
            },
            {
                dataKey: "docRef",
                label: "docRef"
            },
            {
                dataKey: "reason",
                label: "reason"
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
                dataKey: "Note",
                label: "Note"
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