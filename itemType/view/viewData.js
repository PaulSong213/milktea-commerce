export function handleViewClick() {
    const viewDatas = [
        {
            dataKey: "itemTypeCode",
            label: "Item Type Code"
        },
        {
            dataKey: "description",
            label: "Description"
        },

    ];
    $(".view-btn").on('click', function (event) {
        let data = JSON.parse($(this).attr("data-item"));
        $("#viewModalBody").html("");
        for (let i = 0; i < viewDatas.length; i++) {
            const viewData = viewDatas[i];
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