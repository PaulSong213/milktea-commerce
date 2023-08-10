<!DOCTYPE html>

<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="table w-100">
        <h2 class="mt-4 mb-5">INVENTORY SYSTEM</h2>
        <?php include 'add.php'; ?>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>

                    <th>Item Code</th>
                    <th>Unit</th>
                    <th>Unit Type</th>
                    <th>Generic</th>
                    <th>Sug Price</th>
                    <th>MW Price</th>
                    <th>IPD Price</th>
                    <th>Ppricause</th>
                    <th>Status</th>
                    <th>Archive</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $Password = "";
                $database = "zaratehospital";

                $connection = new mysqli($servername, $username, $Password, $database);

                $sql = "select * from inventory_tb ";
                $result = $connection->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>" . $row["itemCode"] . "</td>
                        <td>" . $row["Unit"] . "</td>
                        <td>" . $row["Type"] . "</td>
                        <td>" . $row["Generic"] . "</td>
                        <td>" . $row["SugPrice"] . "</td>
                        <td>" . $row["MWprice"] . "</td>
                        <td>" . $row["IPDprice"] . "</td>
                        <td>" . $row["Ppriceuse"] . "</td>
                        <td>" . $row["Status"] . "</td>
                        <td>" . $row["InventoryID"] . "</td>
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
        } from "../costum-js/datatables.js"
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
                    // {
                    //     extend: 'colvis',
                    //     className: 'btn border border-info'
                    // },
                    {
                        extend: 'pageLength',
                        className: 'btn btn-primary'
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
                    searchColumn(api);
                },
                columnDefs: [{
                    targets: -1,
                    render: (id) => {
                        return `<button class="btn btn-secondary archive-btn" id="${id}">Archive</button>`
                    },
                    "searchable": false
                }]
            });

            handleArchive(table, 1, "/zarate/inventory/archive.php");
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
</body>

</html>