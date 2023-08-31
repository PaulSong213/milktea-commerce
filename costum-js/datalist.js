export function validateDataList(correctDataReference) {
    // on submit form validate
    $("#addItemForm").submit(function (e) {
        let isAllValidated = true;
        $('input[correctData]:visible').each(function () {
            var isValidated = $(this).attr('isValidated');
            if (isValidated !== "true") {
                console.log($(this));
                e.preventDefault();
                Swal.fire(
                    'Please correct the errors before submitting the form.',
                    '',
                    'error'
                );
                e.preventDefault();
                isAllValidated = false;
            }
        });
        if (!isAllValidated) return;
        $('input[correctData]').each(function () {
            $(this).val($(this).attr('sql-value'));
        });
    });

    // correct data of input
    $('input[correctData]').change(function () {
        var correctDataValue = $(this).attr('correctData'); // Get the correctData attribute value
        var inputValue = $(this).val(); // Get the input value
        var id = extractID(inputValue);
        const correctDataObject = correctDataReference[correctDataValue]; // Get the correct data object
        console.log(correctDataReference);



        if (!correctDataObject[id] || !inputValue) {
            console.log('Not Correct Data');
            // if not IPD no need for correct patient account name
            patientValidation: if ($(this).attr('id') === 'patientAccountName') {
                console.log(inputValue);
                if (!inputValue) break patientValidation;
                console.log('1');
                if (!$("#opdRadio").is(':checked')) break patientValidation;
                console.log('2');
                if (parseFloat($("#change").val()) < 0) break patientValidation;
                $(this).removeClass('border-danger');
                $(this).parent().siblings('.feedback').addClass("d-none");
                $(this).siblings('.feedback').addClass("d-none");
                $(this).attr('sql-value', $(this).val());
                $(this).attr('isValidated', "true");
                $(this).removeClass("is-invalid");
                $(this).addClass("is-valid");
                return;
            }
            console.log('invalid');
            $(this).addClass('border-danger');
            $(this).parent().siblings('.feedback').removeClass("d-none");
            $(this).siblings('.feedback').removeClass("d-none");
            $(this).attr('sql-value', "");
            $(this).attr('isValidated', "false");
            $(this).addClass("is-invalid");
            $(this).removeClass("is-valid");
            return;
        } else {
            $(this).removeClass('border-danger');
            $(this).parent().siblings('.feedback').addClass("d-none");
            $(this).siblings('.feedback').addClass("d-none");
            $(this).attr('sql-value', id);
            $(this).attr('isValidated', "true");
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });

    $('input[name="patientAccountType"]').on('change', function () {
        $("#patientAccountName").change();
    });
    $('input[name="change"]').on('change', function () {
        $("#patientAccountName").change();
    });
}

export function extractID(inputString) {
    if (!inputString) return ""; // If the inputString is null, return null (no ID
    if (inputString.indexOf("|") === -1) return ""; // If the inputString does not contain "|", return null (no ID
    var idPart = inputString.split("|")[1].trim(); // Get the part after "|", then trim any leading/trailing spaces
    var id = idPart.split(":")[1].trim(); // Get the ID value after ":"
    return id;
}

