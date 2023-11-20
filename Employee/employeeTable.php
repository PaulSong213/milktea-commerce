<!DOCTYPE html>

<html lang="en">

<head>
    <title>Employee</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="table w-100 p-4">
        <h2 class="mt-4 mb-5">EMPLOYEE</h2>
        <?php include 'add.php'; ?>
        <?php include './view/view.php'; ?>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Created Date</th>
                    <th>Modified Date</th>
                    <th>Status</th>
                    <th class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody>
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
            handleArchiveClick,
            toFormattedDate
        } from "../costum-js/datatables.js";

        import {
            handleEditClick
        } from "./edit/editData.js";
        import {
            handleViewClick
        } from './view/viewData.js'

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
                    url: '/milktea-commerce/API/employee/view.php',
                    dataType: 'JSON',
                    type: 'POST',
                    data: function(d) {
                        d.draw = d.draw || 1;
                    }
                },
                columns: [{
                        data: null,
                        render: (data, type, row) => {
                            return data.fname + " " + data.mname + ", " + data.lname;
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
                            const activeStatus = (data.Status == "1") ? "Active" : "Inactive"; //condition for status
                            const statusColor = (data.Status == "1") ? "alert-success" : "alert-danger"; //condition for color bg.
                            return `
                            <td>
                                <div class='d-flex w-100 h-100 d-flex '>
                                    <h6 style='font-size: 13px' class='p-1 alert m-auto ${statusColor}'>${activeStatus} </h6>
                                </div>
                            </td>
                            `
                        }
                    },
                    {
                        data: null,
                        render: (data, type, row) => {
                            const id = data.DatabaseID;
                            return `
                            <div class="dropdown dropstart d-flex">
                                <button class="btn btn-secondary bg-white text-secondary position-relative mx-auto" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 45px; height: 35px" >
                                    <img class="mb-1" src="../img/icons/ellipsis-horizontal.svg">
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="mx-2">
                                        <button class=" btn action-btn btn-primary w-100 mx-auto view-btn"  data-item='${JSON.stringify(data)}' >View</button>
                                    </li>
                                    <li class="mx-2">
                                        <button class="btn action-btn btn-success w-100 mx-auto edit-btn" data-item='${JSON.stringify(data)}' id="edit_${id}">Edit</button>
                                    </li>
                                    <li class="mx-2">
                                        <button class="btn action-btn btn-secondary archive-btn w-100 mx-auto" id="${id}">Archive</button>
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
                        text: 'Add Employee',
                        className: 'btn btn-primary bg-primary text-white',
                        action: function(e, dt, node, config) {
                            $('#addItemModal').modal('show');
                        }
                    }
                ],
                initComplete: function() {
                    searchColumn(this.api());
                },
                order: [
                    [3, 'asc']
                ]
            });
            handleArchiveClick(table, "userName", "./edit/archive.php", "Status");
            handleEditClick(table, '<?php echo json_decode($_SESSION["user"])->AccessLevel >= 2 ? false : true ?>');
            handleViewClick(table);

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


    <div class="modal fade" id="AdminPassModal" tabindex="2" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <form method="Post" action="./edit/validateAdmin.php">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Requires Admin Permission</h5>

                    </div>
                    <div class="modal-body">
                        <!-- Your editing content goes here -->
                        <div class="form-group">
                            <b><label for="adminPassword">Administrator Password : </label></b>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter Admin Password" oninput="checkField()">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Close</button>
                        <button type="submit" class="btn btn-primary" id="enterPasswordButton" disabled>Enter Admin Password</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        function checkField() {
            var passwordField = document.getElementById('adminPassword');
            var enterButton = document.getElementById('enterPasswordButton');

            if (passwordField.value.trim() !== '') {
                enterButton.disabled = false;
            } else {
                enterButton.disabled = true;
            }
        }
    </script>

</body>

</html>