<<<<<<< HEAD
export function handleEditClick() {
=======
export function handleEditClick(table) {
>>>>>>> 9878317e854c7c643f183bc29836f6422c5af5ca
    $(".edit-btn").on('click', function (e) {
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
                dataKey: "description",
                inputName: "description"
            }
        ];

        // fill up the fields
        for (let i = 0; i < toFillUpDatas.length; i++) {
            const toFillUpData = toFillUpDatas[i];
            $(`[name="${toFillUpData.inputName}"]`).val(data[toFillUpData.dataKey]);
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
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });
    });
}