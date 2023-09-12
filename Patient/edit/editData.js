export function handleEditClick(table) {
    console.log("Edit")
    table.on('click', '.edit-btn', function (e) {
        const addModal = $("#addItemModal");
        addModal.modal('show');
        let data = JSON.parse($(this).attr("data-item"));
        console.log(data);

        const toFillUpDatas = [
            {
                dataKey: "lname",
                inputName: "lname"
            },
            {
                dataKey: "fname",
                inputName: "fname"
            },
             {
                dataKey: "mname",
                inputName: "mname"
            },
             {
                dataKey: "gender",
                inputName: "gender"
            },
             {
                dataKey: "age",
                inputName: "age"
            },
             {
                dataKey: "address",
                inputName: "add"
            },
             {
                dataKey: "bDate",
                inputName: "bdate"
            },
            {
                dataKey: "phone_home",
                inputName: "phoneHome"
            },
            {
                dataKey: "phone_work",
                inputName: "phoneWork"
            },
            {
                dataKey: "cellNo",
                inputName: "phoneCell"
            },
           
            {
                dataKey: "email",
                inputName: "email"
            },
            {
                dataKey: "occupation",
                inputName: "occupation"
            },
            {
                dataKey: "employerName",
                inputName: "employerName"
            },
            {
                dataKey: "employerDetail",
                inputName: "employerNo"
            },
            {
                dataKey: "workAddress",
                inputName: "workAddress"
            },
            {
                dataKey: "nationality",
                inputName: "nationality"
            },
            {
                dataKey: "religion",
                inputName: "religion"
            },
            {
                dataKey: "spouseName",
                inputName: "SpouseName"
            },
            {
                dataKey: "spouseContact",
                inputName: "spousecontactNo"
            },
             {
                dataKey: "motherName",
                inputName: "MotherName"
            },
             {
                dataKey: "motherContact",
                inputName: "mothercontactNo"
            },
             {
                dataKey: "fatherContact",
                inputName: "FatherName"
            },
             {
                dataKey: "fatherName",
                inputName: "fathercontactNo"
            },
             {
                dataKey: "maritalStatus",
                inputName: "marital"
            },
             {
                dataKey: "phMember",
                inputName: "philHealth"
            },
             {
                dataKey: "phNo",
                inputName: "phPin"
            },
              {
                dataKey: "HMO",
                inputName: "HMO"
            },
              {
                dataKey: "typeHMO",
                inputName: "typeHMO"
            },
              {
                dataKey: "CertNo",
                inputName: "certNo"
            },
              {
                dataKey: "emergencyName",
                inputName: "emergencyname"
            },
              {
                dataKey: "patientRelationship",
                inputName: "emergencyRelation"
            },
             {
                dataKey: "emergencyAddress",
                inputName: "emergencyAddress"
            },
              {
                dataKey: "emergencyHome",
                inputName: "emergencyphoneHome"
            },
             {
                dataKey: "emergencyWork",
                inputName: "emergencyphoneWork"
            },
             {
                dataKey: "emergencyCell",
                inputName: "emergencyCphone"
            },
             {
                dataKey: "patientAllergies",
                inputName: "allergies"
            },

             {
                dataKey: "patientsurgicalHistory",
                inputName: "surgicalHistory"
            },
             {
                dataKey: "patientActiveDiag",
                inputName: "activeDiagnosis"
            },
             {
                dataKey: "patientActiveMed",
                inputName: "activeMeds"
            }
        ];

        // fill up the fields
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
            addItemForm.find("input[name='item_id']").remove();
            for (let i = 0; i < toFillUpDatas.length; i++) {
                const toFillUpData = toFillUpDatas[i];
                $(`[name="${toFillUpData.inputName}"]`).val("");
            }
        });
    });


}