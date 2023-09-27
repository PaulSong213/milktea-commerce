<!DOCTYPE html>

<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        .dt-button-collection,
        .dt-button-background {
            position: absolute;
        }

        .button-page-length.dt-button-active {
            background-color: #b6e8f3;
        }

        .dt-button {
            border-radius: 5px;
            border: 1px solid #d1d1d1;
        }

        .buttons-columnVisibility {
            opacity: 0.5;
        }

        .dt-button-active {
            opacity: 1;
        }

        .action-btn {
            font-size: 10px;
            margin-bottom: 5px;
        }

        td:nth-child(2) {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="table w-100 p-4">
        <h2 class="mt-4 mb-5">BILLING LIST</h2>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Bill #</th>
                    <th>Patient</th>
                    <th>Type</th>
                    <th>Date Time Admitted</th>
                    <th>Create Date</th>
                    <th>Modified Date</th>
                    <th class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <?php include '../billing_slip/templates/billing.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        import {
            searchColumn,
            handleArchiveClick,
            toFormattedDate
        } from "../costum-js/datatables.js";

        import {
            handleEditClick
        } from "./edit/editData.js";

        $(document).ready(function() {

            // clone header to add search by columns
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

            const table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/milktea-commerce/API/billing/view.php',
                    dataType: 'JSON',
                    type: 'POST',
                    data: function(d) {
                        d.draw = d.draw || 1;
                    }
                },
                columns: [{
                        data: 'billingID',
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return `${data.patientFirstName} ${data.patientMiddleName} ${data.patientLastName}`;
                        }
                    },
                    {
                        data: 'type',
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return toFormattedDate(data.dateTimeAdmitted);
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return toFormattedDate(data.createDate);
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            return toFormattedDate(data.modifiedDate);
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            const id = data.billingID;
                            return `
                            <div class="dropdown dropstart d-flex">
                                <button class="btn btn-secondary bg-white text-secondary position-relative mx-auto" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 45px; height: 35px" >
                                    <img class="mb-1" src="../img/icons/ellipsis-horizontal.svg">
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="mx-2">
                                        <button class=" btn action-btn btn-primary w-100 mx-auto view-btn view-bill"  data-item='${JSON.stringify(data)}' >View</button>
                                    </li>
                                </ul>
                            </div>
                            `
                        },
                        "searchable": false
                    }
                ],
                orderCellsTop: true,
                fixedHeader: true,
                responsive: true,
                autoFill: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        className: 'btn btn-coffee',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-coffee',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-coffee',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn btn-coffee'
                    },
                    {
                        extend: 'pageLength',
                        className: 'btn btn-coffee'
                    },
                    {
                        text: 'Create Billing',
                        className: 'btn btn-primary bg-primary text-white',
                        action: function(e, dt, node, config) {
                            window.location.href = '/milktea-commerce/billing-new-admission/index.php';
                        }
                    }
                ],
                initComplete: function() {
                    searchColumn(this.api());
                },
                order: [
                    ['0', 'desc']
                ]
            });
            handleEditClick(table);

            table.on('draw', function() {
                $('.action-wrapper').each(function(i, e) {
                    $(this).removeClass('invisible');
                });
            });
            table.page(1).draw(true);
            table.on('click', '.view-bill', function(e) {
                let bill = JSON.parse($(this).attr("data-item"));
                showBill(bill.billingID);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#saveItemButton').click(function() {
                var itemCode = $('#itemCode').val();
                var unit = $('#Unit').val();
                var description = $('#description').val();
                if (itemCode.trim() === "" || unit.trim() === "" || description.trim() === "") {
                    return false; // Prevent closing modal and form submission
                } else {
                    $('#addItemModal').modal('hide'); // Close the modal after saving
                }
            });
        });
        $('#Closemodal1, #Closemodal2').click(function() {
            $('#addItemModal').modal('hide'); // Close the modal when the close button is clicked
        });
    </script>
</body>

</html>