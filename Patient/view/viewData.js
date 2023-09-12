import { formatDate } from "../../costum-js/date.js";
export function handleViewClick(table) {
    console.log ("test")
    const viewDatas = [
        {
            dataKey: "hospistalrecordNo",
            label: "Hospital Record No"
        },
        {
            dataKey: "lname",
            label: "Last Name"
        },
        {
            dataKey: "fname",
            label: "First Name"
        },
         {
            dataKey: "mname",
            label: "Middle Name"
        },
         {
            dataKey: "age",
            label: "Age"
        },
          {
            dataKey: "gender",
            label: "Gender"
        },
         {
            dataKey: "bDate",
            label: "Birth Date"
        },
         {
            dataKey: "address",
            label: "Address"
        },
         {
            dataKey: "phone_home",
            label: "Phone No.(Home)"
        },
         {
            dataKey: "phone_work",
            label: "Phone No.(Work)"
        },
         {
            dataKey: "cellNo",
            label: "Cellphone No."
        },
        {
            dataKey: "email",
            label: "Email Address"
        },
        {
            dataKey: "occupation",
            label: "Occupation"
        },
        {
            dataKey: "employerName",
            label: "Employer Details"
        },
        {
            dataKey: "employerDetail",
            label: "Employer Contails Details"
        },
        {
            dataKey: "workAddress",
            label: "Work Address"
        },
        {
            dataKey: "nationality",
            label: "Nationality"
        },
        {
            dataKey: "religion",
            label: "Religion"
        },
        {
            dataKey: "maritalStatus",
            label: "Marital Status"
        },
         {
            dataKey: "spouseName",
            label: "Spouse Name"
        },
         {
            dataKey: "spouseContact",
            label: "Spouse Contact"
        },
         {
            dataKey: "motherName",
            label: "Mother Name"
        },
         {
            dataKey: "motherContact",
            label: "Mother Contact"
        },
         {
            dataKey: "fatherName",
            label: "Father Name"
        },
         {
            dataKey: "fatherContact",
            label: "Father Contact"
        },
         {
            dataKey: "phMember",
            label: "PhilHealth Member"
        },
         {
            dataKey: "phNo",
            label: "PhilHealth No(PIN)"
        },
         {
            dataKey: "HMO",
            label: "HMO"
        },
         {
            dataKey: "typeHMO",
            label: "typeHMO"
        },
         {
            dataKey: "CertNo",
            label: "Cert. No."
        },
         {
            dataKey: "emergencyName",
            label: "Emergency Name"
        },
         {
            dataKey: "patientRelationship",
            label: "Relationship in the Patient"
        },
         {
            dataKey: "emergencyAddress",
            label: "Address"
        },
         {
            dataKey: "emergencyHome",
            label: "Phone No(Home)"
        },
         {
            dataKey: "emergencyWork",
            label: "Phone No(Work)"
        },
        {
            dataKey: "emergencyCell",
            label: "Cellphone No."
        },
        {
            dataKey: "patientAllergies",
            label: "Patient Allergies"
        },
        {
            dataKey: "patientsurgicalHistory",
            label: "Patient Surgical Diagnosis History"
        },
         {
            dataKey: "patientActiveMed",
            label: "Patient Active Medication"
        },

    ];
    table.on('click', '.view-btn', function (e) {
        let data = JSON.parse($(this).attr("data-item"));
        $("#viewModalBody").html("");

        for (let i = 0; i < viewDatas.length; i++) {
            const viewData = viewDatas[i];
            if (viewData.label.includes("Date")) data[viewData.dataKey] = formatDate(new Date(data[viewData.dataKey]));
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