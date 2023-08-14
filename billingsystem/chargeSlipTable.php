<!DOCTYPE html>

<html lang="en">

<head>
    <title>charge Slip</title>
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
    </style>
</head>

<body>
    <div class="table w-100 p-4">
        <h2 class="mt-4 mb-5">BILLING SYSTEM</h2>
        <?php include 'add.php'; ?>
        <?php include './view/view.php'; ?>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Inv</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Disc%</th>
                    <th>Disc Amt</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost"; //localhost
                $username = "root"; //username
                $Password = ""; //password
                $database = "zaratehospital"; //database

                $connection = new mysqli($servername, $username, $Password, $database);

                $sql = "select * from inventory_tb ";
                $result = $connection->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $rowData = json_encode($row); // Convert row data to JSON format

                    echo "
        <tr>
            <td><input type='text' name='itemCode[]' value='" . $row["itemCode"] . "' class='form-control'></td>
            <td><input type='text' name='Inv' value='" . $row["Unit"] . "' class='form-control'></td>
            <td><input type='text' name='Qty' value='" . $row["Unit"] . "' class='form-control'></td>
            <td><input type='text' name='Unit' value='" . $row["Unit"] . "' class='form-control'></td>
            <td><input type='text' name='Price' value='" . $row["Unit"] . "' class='form-control'></td>
            <td><input type='text' name='Disc%' value='" . $row["Unit"] . "' class='form-control'></td>
            <td><input type='text' name='DiscAmt' value='" . $row["Unit"] . "' class='form-control'></td>
            <td><input type='text' name='SubTotal' value='" . $row["Unit"] . "' class='form-control'></td>
        </tr>";
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
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="module">
        import {
            searchColumn,
            handleArchiveClick,
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
                initComplete: function() {
                    searchColumn(this.api());
                },
                columnDefs: [{
                    targets: -1,
                    render: (d) => {
                        const data = JSON.parse(d);
                        const id = data.InventoryID;
                        return `
                       
                        `
                    },
                    "searchable": false
                }],
                order: [
                    [5, 'asc']
                ]
            });
            handleArchiveClick(table, 0, "./edit/archive.php", 6);
            handleEditClick("#addItemModal");
            handleViewClick();
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
</body>

</html>