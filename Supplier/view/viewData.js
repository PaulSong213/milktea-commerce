export function handleViewClick() {
    const viewDatas = [
         {
            dataKey: "supplier_name",
            label: "Supplier Name"
        },
        {
            dataKey: "address",
            label: "Address"
        },
        {
            dataKey: "telNum",
            label: "Telephone Number"
        },
        {
            dataKey: "faxNum",
            label: "Fax Number"
        },
        {
            dataKey: "celNum",
            label: "Cellphone Number"
        },
        {
            dataKey: "contactNum",
            label: "Contact Number"
        },
        {
            dataKey: "Snote",
            label: "Note"
        },

        {
            dataKey: "status",
            label: "Status"
        },
           

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