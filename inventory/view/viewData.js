export function handleViewClick() {
    const viewDatas = [
        {
            dataKey: "itemCode",
            label: "Item Code"
        },
        {
            dataKey: "Type",
            label: "Unit Type"
        },
        {
            dataKey: "Unit",
            label: "Unit"
        },
        {
            dataKey: "Description",
            label: "Description"
        },
        {
            dataKey: "Generic",
            label: "Generic"
        },
        {
            dataKey: "SugPrice",
            label: "Sugprice"
        },
        {
            dataKey: "MWprice",
            label: "MWprice"
        },
        {
            dataKey: "IPDprice",
            label: "IPDprice"
        },
        {
            dataKey: "Ppriceuse",
            label: "Ppriceuse"
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