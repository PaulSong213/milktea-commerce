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
                    <th>Action</th>

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

                            while ($row = $result -> fetch_assoc()) {
                               echo "
                                <tr>
                                   
                                    <td>".$row["itemCode"]."</td>
                                    <td>".$row["Unit"]."</td>
                                    <td>".$row["Type"]."</td>
                                    
                                    <td>".$row["Generic"]."</td>
                                    <td>".$row["SugPrice"]."</td>
                                    <td>".$row["MWprice"]."</td>
                                    <td>".$row["IPDprice"]."</td>
                                    <td>".$row["Ppriceuse"]."</td>
                                    <td>".$row["Status"]."</td>
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
    <script>
        $(document).ready(function() {

            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

            $('#example').DataTable({
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
                ],
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
            });
        });
    </script>
</body>

</html>