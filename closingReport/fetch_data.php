<!DOCTYPE html>

<html lang="en">

<head>
                <div class="d-flex justify-content-center align-items-center">
                    <img style="height: 60px;" src="../img/logo.png" alt="ZARATE LOGO">
                    <div class="mx-3 d-flex flex-column justify-content-end text-center">
                        <h5 class="fw-bold mb-1">E. Zarate Hospital</h5>
                        <h6 class="text-muted">16 J. Aguilar Avenue, Talon, Las Piñas City, <br />Metro Manila, Philippines 1747</h6>
                    </div>
                </div>
                <hr class="my-4">

    <title>
        
    </title>
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
<body>
<div class="py-3">
    <div class="d-flex justify-content-between">
        <div style="margin-right: 15px;">
            <h3 class="fw-bold mb-1">CLOSING REPORT AS OF:</h3>
            <?php
            if (isset($_POST['dateTimeIn']) && isset($_POST['dateTimeOut'])) {
                $dateTimeIn = $_POST['dateTimeIn'];
                $dateTimeOut = $_POST['dateTimeOut'];
                echo "<p class='mb-0'>$dateTimeIn - $dateTimeOut</p>";
            }
            ?>
        </div>
    </div>
</div>
    
<div class="table w-100 p-4">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Product Info</th>
                    <th>Net Sale</th>
                    <th>Net Amount</th>
                    <th>Amount Tendered</th>
                    <th>Change Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../php/connect.php';
                if (isset($_POST['dateTimeIn']) && isset($_POST['dateTimeOut'])) {
                    $dateTimeIn = $_POST['dateTimeIn'];
                    $dateTimeOut = $_POST['dateTimeOut'];

                    $connection = connect();
                    $sql = "SELECT * FROM sales_tb WHERE createDate >= '$dateTimeIn' AND createDate <= '$dateTimeOut'";
                    $result = $connection->query($sql);

                    $totalNetSale = 0;
                    $totalNetAmount = 0;

                    while ($row = $result->fetch_assoc()) {
                        // Access the value of ProductInfo
                        $productInfoJson = $row["ProductInfo"];
                    
                        // Convert the JSON string to a PHP array
                        $productInfoArray = json_decode($productInfoJson, true);
                    
                        // Access specific values within the ProductInfo array
                        $subtotal = $productInfoArray[0]["subtotal"];
                        $productId = $productInfoArray[0]["product_id"];
                        $qty = $productInfoArray[0]["qty"];
                    
                        echo "
                            <tr>
                                <td>" . $row["createDate"] . "</td>
                                <td>" . $productId . " " . $qty . "</td>
                                <td>" . $row["NetSale"] . "</td>
                                <td>" . $row["NetAmt"] . "</td>
                                <td>" . $row["AmtTendered"] . "</td>
                                <td>" . $row["ChangeAmt"] . "</td>
                            </tr>";
                    
                        $totalNetSale += $row["NetSale"];
                        $totalNetAmount += $row["NetAmt"];
                    }

                    echo "
                    <tr>
                            <th colspan='0'>Total:</th>
                            <th></th>
                            <th></th>
                            <th colspan='5'>$totalNetSale</th>
                            <th></th>
                    </tr>";
                } else {
                    echo "<tr><td colspan='6'>No data to display.</td></tr>";
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
                        className: 'btn border border-info',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn border border-info',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn border border-info',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
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
                        text: 'Add Item Type',
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
                            </ul>
                        </div>
                        `
                    },
                    "searchable": false
                }],
                order: [
                    [3, 'asc']
                ]
            });
            handleEditClick(table);
            handleViewClick(table);

            table.on('draw', function() {
                $('.action-wrapper').each(function(i, e) {
                    $(this).removeClass('invisible');
                });
            });
            table.page(1).draw(true);
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