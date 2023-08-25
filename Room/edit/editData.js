export function handleEditClick(table) {
    $(".edit-btn").on('click', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "Roomref",
                inputName: "roomRef"
            },
            {
                dataKey: "roomDescription",
                inputName: "roomDescription"
            },
             {
                dataKey: "rateperDay",
                inputName: "rateperDay"
            }
        ];

        // fill up the fields
        for (let i = 0; i < toFillUpDatas.length; i++) {
            const toFillUpData = toFillUpDatas[i];
            $(`[name="${toFillUpData.inputName}"]`).val(data[toFillUpData.dataKey]);
        }

        // edit the save button
        const saveButton = $("[name='SaveItem']");
        saveButton.text("Edit Room Information");

        // edit header title
        const headerTitle = $("#addItemModalLabel");
        headerTitle.text("Edit Room Information");

        const addItemForm = $("#addItemForm");
        const addItemFormAction = addItemForm.attr("action");
        addItemForm.attr("action", "./edit/editfunction.php");
        addItemForm.append(`<input type="hidden" name="itemTypeID" value="${data['hospistalrecordNo']}">`);

        // watch modal close then reset data
        addModal.on("hidden.bs.modal", function () {
            headerTitle.text("Add New Patient");
            saveButton.text("Add New Patient");
            addItemForm.attr("action", addItemFormAction);
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });
    });
}