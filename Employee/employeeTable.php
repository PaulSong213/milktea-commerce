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
    </style>
</head>

<body>
    <div class="table w-100 p-4">
        <h2 class="mt-4 mb-5">EMPLOYEE LIST</h2>
        <?php include 'add.php'; ?>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    
                    <th>Employee Code</th>
                    <th>Employee Name</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Added Date</th>
                    <th>Modified Date</th>
                    <th>Status</th>
                    <th>Archive</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost"; //localhost
                $username = "root"; //username
                $Password = ""; //password
                $database = "zaratehospital"; //database

                $connection = new mysqli($servername, $username, $Password, $database);

                $sql = "select * from employee_tb ";
                $result = $connection->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $activeStatus = ($row["Status"]  == "1") ? "Active"  : "Inactive"; //condition for status
                    $statusColor = ($row["Status"]  == "1") ? "bg-success"  : "bg-danger"; //condition for color bg.
                    echo "
                                <tr>
                                    <td>" . $row["EmployeeCode"] . "</td>
                                    <td> 
                                        " . $row["fname"] . " 
                                        " . $row["mname"] . "
                                        " . $row["lname"] . "
                                    </td>
                                    <td>" . $row["title"] . "</td>
                                    <td>" . $row["position"] . "</td>
                                    <td>" . $row["department"] . "</td>
                                    <td>" . $row["createDate"] . "</td>
                                    <td>" . $row["modifiedDate"] . "</td>
                                    <td class='" . $statusColor . "'>" . $activeStatus . "</td>
                                    <td>" . $row["DatabaseID"] . "</td>
                                </tr>
                             ";
                }
                ?>
            </tbody>
        </table>
    </div>
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
            handleArchive

        } from "../costum-js/datatables.js";
        $(document).ready(function() {

            // clone header to add search by columns
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

            const table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                responsive: true,
                autoFill: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'print',
                        className: 'btn border border-info'
                    },
                    {
                        extend: 'colvis',
                        className: 'btn border border-info'
                    },
                    {
                        extend: 'pageLength',
                        className: 'btn border border-info'
                    },
                    {
                        text: 'Add Item',
                        className: 'btn btn-primary bg-primary text-white',
                        action: function(e, dt, node, config) {
                            $('#addItemModal').modal('show');
                        }
                    }
                ],
                columnDefs: [{
                    data: null,
                    defaultContent: '<button class="btn btn-secondary archive-btn">Archive</button>',
                    targets: -1
                }],
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
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
                                .on('change', function(e) {
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
                                .on('keyup', function(e) {
                                    e.stopPropagation();

                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
                columnDefs: [{
                    targets: -1,
                    render: (id) => {
                        return `<button class="btn btn-secondary archive-btn" id="${id}">Archive</button>`
                    },
                    "searchable": false
                }]
            });

            handleArchive(table, 0, "/zarate/inventory/archive.php");
        });
    </script>

    <script>
        $('#saveItemButton').click(function() {
            $('#addItemModal').modal('hide'); // Close the modal after saving
        });

        $('#Closemodal2').click(function() {
            $('#addItemModal').modal('hide'); // Close the modal when the close button is clicked
        });
        $('#Closemodal1').click(function() {
            $('#addItemModal').modal('hide'); // Close the modal when the close button is clicked
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $(".xp-menubar,.body-overlay").on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });
    </script>
    <script>
        var value = false;
        $(document).ready(function() {
            $('#saveItemButton').click(function() {
                var itemCode = $('#item_code').val();
                var unit = $('#Unit').val();
                var description = $('#description').val();

                if (itemCode.trim() === "" || unit.trim() === "" || description.trim() === "") {
                    swal.fire("Please fill in all required fields.");
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