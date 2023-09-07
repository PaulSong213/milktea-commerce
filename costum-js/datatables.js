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
            cell.hide();
            // TODO: add a working search by column
        });
    $("#example_filter").html(`
            <div class="d-flex justify-content-end">
                <input class="form-control" type="search" id="searchInput" placeholder="Search...">
                <button class="btn btn-primary mx-1" id="searchButton">Search</button>
            </div>
        `);
    $('#searchButton').on('click', function () {
        const searchValue = $('#searchInput').val();
        api.search(searchValue).draw();
    });

    // Input keyup event handler
    $('#searchInput').on('keyup', function (event) {
        if (event.key === 'Enter') {
            // If Enter key is pressed, trigger the search
            const searchValue = $(this).val();
            api.search(searchValue).draw();
        } else if ($(this).val() === '') {
            // If input value is empty, trigger the search
            api.search('').draw();
        }
    });

    $('#searchInput').on('search', function () {
        api.search('').draw();
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
        console.log(data)
        const status = data[statusIndex];
        console.log(status);
        const action = status.includes("1") ? "Archive" : "Unarchive";
        const actionColor = status.includes("1") ? "btn-danger" : "btn-success";
        // Get the title for the row that was clicked on
        let title = data[titleIndex] || "Data";
        // Open a sweet alert to confirm the action
        Swal.fire({
            title: `Do you want to ${action} ${title}?`,
            showCancelButton: true,
            confirmButtonText: action,
            buttonsStyling: false,
            customClass: {
                confirmButton: `btn ${actionColor} mx-2`,
                cancelButton: 'btn btn-secondary mx-2'
            },
            html: `
            <form id="archiveForm" action="${apiEndpoint}" method="post">
                <input type="hidden" name="rowID" value="${id}">
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
        let isActive = statusElement.includes("1");
        $(this).text(isActive ? 'Archive' : 'Unarchive');
        $(this).addClass(isActive ? 'bg-secondary' : 'btn-success');
        $(this).closest('td').removeClass('invisible');
    });
    handleArchiveUIonRedraw(table, statusIndex);
}

export function toFormattedDate(date) {
    const inputDate = new Date(date);

    // Check if the inputDate is valid
    if (isNaN(inputDate)) {
        return "N/A";
    }

    const months = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];

    const formattedDate = `${months[inputDate.getMonth()]} ${inputDate.getDate()}, ${inputDate.getFullYear()} ${inputDate.getHours()}:${inputDate.getMinutes()}`;
    return formattedDate;
}
