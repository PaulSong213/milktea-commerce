export function handleEditClick(table) {
    table.on('click', '.edit-btn', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "supplier_code",
                inputName: "supplier_code"
            },
            {
                dataKey: "supplier_name",
                inputName: "supplier_name"
            },
            {
                dataKey: "address",
                inputName: "address"
            },
            {
                dataKey: "telNum",
                inputName: "telNum"
            },
            {
                dataKey: "faxNum",
                inputName: "faxNum"
            },
            {
                dataKey: "CelNum",
                inputName: "CelNum"
            },
            {
                dataKey: "contactNo",
                inputName: "contactNo"
            },
            {
                dataKey: "note",
                inputName: "note"
            }

        ];

        // fill up the fields
        for (let i = 0; i < toFillUpDatas.length; i++) {
            const toFillUpData = toFillUpDatas[i];
            $(`[name="${toFillUpData.inputName}"]`).val(data[toFillUpData.dataKey]);
        }

        // edit the save button
        const saveButton = $("[name='SaveItem']");
        saveButton.text("Edit Supplier");

        // edit header title
        const headerTitle = $("#addItemModalLabel");
        headerTitle.text("Edit Supplier");

        const addItemForm = $("#addItemForm");
        const addItemFormAction = addItemForm.attr("action");
        addItemForm.attr("action", "./edit/editfunction.php");
        addItemForm.append(`<input type="hidden" name="item_id" value="${data['supplier_code']}">`);

        // watch modal close then reset data
        addModal.on("hidden.bs.modal", function () {
            headerTitle.text("Add Item");
            saveButton.text("Add Item");
            addItemForm.attr("action", "./add/addfunction.php");
            addItemForm.find("input[name='item_id']").remove();
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });
    });
}