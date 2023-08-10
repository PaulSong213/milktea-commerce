// data table costumizations
export function searchColumn(api) {
    // For each column
    api
        .columns()
        .eq(0)
        .each(function (colIdx) {
            // Set the header cell to contain the input element
            var cell = $('.filters th').eq(
                $(api.column(colIdx).header()).index()
            );
            var title = $(cell).text();
            $(cell).html('<input type="text" class="form-control" placeholder="' +
                title + '" />');

            // On every keypress in this input
            $(
                'input',
                $('.filters th').eq($(api.column(colIdx).header()).index())
            )
                .off('keyup change')
                .on('change', function (e) {
                    // Get the search value
                    $(this).attr('title', $(this).val());
                    var regexr =
                        '({search})'; //$(this).parents('th').find('select').val();

                    var cursorPosition = this.selectionStart;
                    // Search the column for that value
                    api
                        .column(colIdx)
                        .search(
                            this.value != '' ?
                                regexr.replace('{search}', '(((' + this.value +
                                    ')))') :
                                '',
                            this.value != '',
                            this.value == ''
                        )
                        .draw();
                })
                .on('keyup', function (e) {
                    e.stopPropagation();

                    $(this).trigger('change');
                    $(this)
                        .focus()[0]
                        .setSelectionRange(cursorPosition, cursorPosition);
                });
        });
}

export function handleArchive(table, titleIndex, apiEndpoint) {
    table.on('click', '.archive-btn', function (e) {
        let data = table.row(e.target.closest('tr')).data();
        let title = data[titleIndex] || "Data";
        Swal.fire({
            title: `Do you want to archive ${title}?`,
            showCancelButton: true,
            confirmButtonText: 'Archive',
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-danger mx-2',
                cancelButton: 'btn btn-secondary mx-2'
            },
        }).then((result) => {
            if (!result.isConfirmed) return;

        })
    });
}