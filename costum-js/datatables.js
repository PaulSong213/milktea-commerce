// data table costumizations

/**
* Add function to filter each columns
* @param  {Object} datatable api
*/
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

/**
* Archive function for each row in the table
* @param  {Object} table datatable table object
* @param  {Number} [tableIndex = "Data"] table index to show as title in the alert
* @param  {String} apiEndpoint api endpoint to send the archive request to
*/
export function handleArchiveClick(table, titleIndex, apiEndpoint, statusIndex) {
    renderArchiveButton(table, statusIndex);
    // When the archive button is clicked, open a sweet alert
    // to ask the user to confirm the action.
    table.on('click', '.archive-btn', function (e) {

        const id = e.target.id;

        // Get the data for the row that was clicked on
        let data = table.row(e.target.closest('tr')).data();
        // Get the title for the row that was clicked on
        let title = data[titleIndex] || "Data";
        // Open a sweet alert to confirm the action
        Swal.fire({
            title: `Do you want to archive ${title}?`,
            showCancelButton: true,
            confirmButtonText: 'Archive',
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-danger mx-2',
                cancelButton: 'btn btn-secondary mx-2'
            },
            html: `
            <form id="archiveForm" action="/zarate/inventory/archive.php" method="post">
                <input type="hidden" name="InventoryID" value="${id}">
            </form>
            `
        }).then((result) => {
            if (!result.isConfirmed) return; // If the user cancels, do nothing
            $("#archiveForm").submit();
        })
    })
}

function handleArchiveUIonRedraw(table, statusIndex) {
    table.on('draw', function () {
        renderArchiveButton(table, statusIndex);
    });
}

function renderArchiveButton(table, statusIndex) {
    $('.archive-btn').each(function (i, e) {
        let data = table.row(e.closest('tr')).data();
        let statusElement = data[statusIndex];
        let isActive = statusElement.includes("Active");
        $(this).text(isActive ? 'Archive' : 'Unarchive');
        $(this).addClass(isActive ? 'bg-secondary' : 'btn-success');
    });
    handleArchiveUIonRedraw(table, statusIndex);
}