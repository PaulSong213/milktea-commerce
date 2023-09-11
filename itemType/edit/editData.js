export function handleEditClick(table) {
    table.on('click', '.edit-btn', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "itemTypeCode",
                inputName: "itemTypeCode"
            },
            {
                dataKey: "is_consumable",
                inputName: "is_consumable"
            },
            {
                dataKey: "departmentID",
                inputName: "departmentID"
            },
            {
                dataKey: "description",
                inputName: "description"
            }
        ];

        // fill up the fields
        for (let i = 0; i < toFillUpDatas.length; i++) {
            const toFillUpData = toFillUpDatas[i];
            if (toFillUpData.dataKey === "is_consumable") {
                $(`[name="${toFillUpData.inputName}"]`).prop('checked', () => {
                    return data[toFillUpData.dataKey] === "1";
                });
                continue;
            }

            $(`[name="${toFillUpData.inputName}"]`).val(data[toFillUpData.dataKey]);
            console.log($(`[name="${toFillUpData.inputName}"]`));
        }

        // edit the save button
        const saveButton = $("[name='SaveItem']");
        saveButton.text("Edit Item");

        // edit header title
        const headerTitle = $("#addItemModalLabel");
        headerTitle.text("Edit Item");

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
            $(`[name="is_consumable"]`).prop('checked', true);
        });
    });
}