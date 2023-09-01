import { formatDate } from "../../costum-js/date.js";

export function handleViewClick(table) {
    const viewDatas = [
        { dataKey: "billingID", label: "Billing ID" },
        { dataKeys: ["encoderTitle", "encoderFirstName", "encoderMiddleName", "encoderLastName"], label: "Encoder Full Name" },
        { dataKey: "encoderPosition", label: "Encoder Position" },
        { dataKeys: ["patientFirstName", "patientMiddleName", "patientLastName"], label: "Patient Full Name" },
        { dataKeys: ["attendingPhysicianTitle", "attendingPhysicianFirstName", "attendingPhysicianMiddleName", "attendingPhysicianLastName"], label: "Attending Physician Full Name" },
        { dataKey: "attendingPhysicianPosition", label: "Attending Physician Position" },
        { dataKeys: ["admittingPhysicianTitle", "admittingPhysicianFirstName", "admittingPhysicianMiddleName", "admittingPhysicianLastName"], label: "Admitting Physician Full Name" },
        { dataKey: "admittingPhysicianPosition", label: "Admitting Physician Position" },
        { dataKey: "dateTimeAdmitted", label: "Admission Date:Time" },
        { dataKey: "type", label: "Patient Type" },
        { dataKey: "dateTimeDischarged", label: "Discharge Date:Time" },
        { dataKey: "dateTimeDischarged", label: "Discharge Date:Time" },
         { dataKey: "productInfo", label: "Product Info" },

        // Add more viewDatas for other columns as needed
    ];

    table.on('click', '.view-btn', function (e) {
        const data = JSON.parse($(this).attr("data-item"));
        const $viewModalBody = $("#viewModalBody");
        $viewModalBody.empty();

        for (const viewData of viewDatas) {
            if (viewData.dataKeys) {
                const hasTitle = viewData.dataKeys.includes("Title");
                const nameKeys = viewData.dataKeys.filter(key => key !== "Title");
                const nameValues = nameKeys.map(key => data[key]).filter(Boolean);
                const titleValue = data["Title"];

                if (hasTitle && titleValue && nameValues.length > 0) {
                    $viewModalBody.append(`
                        <div class="d-flex justify-content-between">
                            <h5 class="mx-2">${viewData.label}:</h5>
                            <h5 class="fw-bold">${titleValue} ${nameValues.join(" ")}</h5>
                        </div>
                    `);
                } else {
                    const combinedName = nameValues.join(" ");
                    if (combinedName) {
                        $viewModalBody.append(`
                            <div class="d-flex justify-content-between">
                                <h5 class="mx-2">${viewData.label}:</h5>
                                <h5 class="fw-bold">${combinedName}</h5>
                            </div>
                        `);
                    }
                }
            } else {
                const value = data[viewData.dataKey] || "None";
                $viewModalBody.append(`
                    <div class="d-flex justify-content-between">
                        <h5 class="mx-2">${viewData.label}:</h5>
                        <h5 class="fw-bold">${value}</h5>
                    </div>
                `);
            }
        }

        $('#viewItemModal').modal('show');
    });
}
