export function validateDataList(correctDataReference) {
    // on submit form validate
    // $("#createBillingForm").submit(function (e) {
    //     let isAllValidated = true;
    //     $('input[correctData]').each(function () {
    //         var isValidated = $(this).attr('isValidated');
    //         if (isValidated !== "true") {
    //             console.log($(this));
    //             e.preventDefault();
    //             Swal.fire(
    //                 'Please correct the errors before submitting the form.',
    //                 '',
    //                 'error'
    //             );
    //             e.preventDefault();
    //             isAllValidated = false;
    //         }
    //     });
    //     if (!isAllValidated) return;
    //     $('input[correctData]').each(function () {
    //         $(this).val($(this).attr('sql-value'));
    //     });
    // });

    // correct data of input
    $('input[correctData]').change(function () {
        var correctDataValue = $(this).attr('correctData'); // Get the correctData attribute value
        var inputValue = $(this).val(); // Get the input value
        var id = extractID(inputValue);
        const correctDataObject = correctDataReference[correctDataValue]; // Get the correct data object
        if (!correctDataObject[id]) {
            $(this).addClass('border-danger');
            $(this).siblings('.feedback').removeClass("d-none");
            $(this).attr('sql-value', "");
            $(this).attr('isValidated', "false");
            return;
        } else {
            $(this).removeClass('border-danger');
            $(this).siblings('.feedback').addClass("d-none");
            $(this).attr('sql-value', id);
            $(this).attr('isValidated', "true");
        }
    });
}