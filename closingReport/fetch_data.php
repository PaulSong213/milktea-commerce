<!DOCTYPE html>

<html lang="en">

<head>
    <div class="d-flex justify-content-center align-items-center">
        <img style="height: 60px;" src="../img/logo.png" alt="ZARATE LOGO">
        <div class="mx-3 d-flex flex-column justify-content-end text-center">
            <h5 class="fw-bold mb-1">E. Zarate Hospital</h5>
            <p class="text-muted">16 J. Aguilar Avenue, Talon, Las Piñas City, <br />Metro Manila, Philippines 1747</p>
        </div>
    </div>
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

<body class="container-fluid" style="max-width: 100%;">
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

    <div class="table-fluid p-4">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sales ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
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
                                <td>" . $row["SalesID"] . "</td>
                                <td>" . $productId . "</td>
                                <td>" . $qty . "</td>
                                <td>" . $subtotal . "</td>
                                
                            </tr>";

                        $totalNetSale += $subtotal;
                    }

                    echo "
                    <tr>
                            <th colspan='0'>Total:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan='5'>$totalNetSale</th>
                    </tr>";
                } else {
                    echo "<tr><td colspan='6'>No data to display.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    require_once '../php/connect.php';
    // Function to execute a query and return the result or 0 if no result
    function executeQuery($conn, $query)
    {
        $result = $conn->query($query);
        return $result->num_rows > 0 ? $result->fetch_assoc() : 0;
    }

    $conn = connect();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get total net amount
    $queryTotalNet = "SELECT SUM(NetAmt) AS total_net_amount FROM sales_tb";
    $totalNetAmount = executeQuery($conn, $queryTotalNet);

    // Calculate total cash amount
    $queryTotalCash = "SELECT SUM(NetAmt) - SUM(CASE WHEN ChangeAmt < 0 THEN ChangeAmt ELSE 0 END) AS total_Cash FROM sales_tb";
    $totalCashAmount = executeQuery($conn, $queryTotalCash);

    $queryTotalNet = "SELECT SUM(NetAmt) AS total_net_amount FROM sales_tb";
    $totalNetAmount = executeQuery($conn, $queryTotalNet);
    ?>
    <div class="container-fluid border border-dark">
        <div class="row">
            <div class="col-5 d-flex flex-column">
                <!-- Total Sale -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL SALE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <!-- Transactions -->
                <div class="d-flex justify-content-between">
                    <span>Cash Transactions:</span>
                    <span>₱ <?= number_format($totalCashAmount['total_Cash'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Bill Transactions:</span>
                    <span>₱ <?= number_format($totalCashAmount['total_Cash'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>NYP Transactions:</span>
                    <span>₱ <?= number_format($totalCashAmount['total_Cash'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <span>Employee Transactions:</span>
                    <span>₱ <?= number_format($totalCashAmount['total_Cash'] ?? 0, 2); ?></span>
                </div>

                <!-- Clinic Use -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL CLINIC USE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Personal Use -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL PERSONAL USE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Bill Discount -->
                <div class="d-flex justify-content-between fw-bold border-bottom">
                    <span>TOTAL BILL DISCOUNT:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- More elements as needed -->

                <!-- Beginning Balance -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>BEGINNING BALANCE</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>CASH:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between border-bottom">
                    <span>CHECK:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Total Cash In -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL CASH IN:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Total Check In -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL CHECK IN:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Total Amount In -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL AMOUNT IN:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Previous Shiftee -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>PREVIOUS SHIFTEE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>

                <!-- Rest of your content for the left column -->
            </div>

            <div class="col-7">
                <!-- Cash Transaction for This Shift -->
                <div class="d-flex justify-content-between fw-bold">
                    <span>CASH TRANSACTION FOR THIS SHIFT:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between ">
                    <span>+ CASH TRANSACTIONS:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between ">
                    <span>+ BILL CASH PAYMENTS:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between ">
                    <span>+ NYP CASH PAYMENTS::</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between  border-bottom">
                    <span>= SHIFT CASH BALANCE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between fw-bold">
                    <span>CHECK TRANSACTIONS FOR THIS SHIFT:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between ">
                    <span>+ BILL CHECK PAYMENTS:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between border-bottom ">
                    <span>+ NYP CHECK PAYMENTS:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between fw-bold ">
                    <span>ENDING CASH BALANCE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between fw-bold">
                    <span>ENDING CHECK BALANCE:</span>
                    <span>₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?></span>
                </div>
                <div class="d-flex justify-content-between fw-bold">
                    <span>TOTAL AMOUNT ON HAND:</span>
                    <span class="border border-2 px-2">
                        ₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?>
                    </span>
                </div>

                <!-- Rest of your content for the right column -->
            </div>
        </div>
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
</body>

</html>