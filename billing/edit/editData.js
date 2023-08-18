export function handleEditClick(table) {
    $(".edit-btn").on('click', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "itemCode",
                inputName: "item_code"
            },
            {
                dataKey: "Type",
                inputName: "type"
            },
            {
                dataKey: "Unit",
                inputName: "Unit"
            },
            {
                dataKey: "Description",
                inputName: "description"
            },
            {
                dataKey: "Generic",
                inputName: "Generic"
            },
            {
                dataKey: "SugPrice",
                inputName: "Sugprice"
            },
            {
                dataKey: "MWprice",
                inputName: "MWprice"
            },
            {
                dataKey: "IPDprice",
                inputName: "IPDprice"
            },
            {
                dataKey: "Ppriceuse",
                inputName: "Ppriceuse"
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
        addItemForm.attr("action", "./edit/editfunction.php");
        addItemForm.append(`<input type="hidden" name="item_id" value="${data['InventoryID']}">`);

        // watch modal close then reset data
        addModal.on("hidden.bs.modal", function () {
            headerTitle.text("Add Item");
            saveButton.text("Add Item");
            addItemForm.attr("action", "addfunction.php");
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });
    });
}