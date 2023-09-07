<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once '../php/connect.php';
$conn = connect();
//RAW DATES
$dateTimeIn = $_POST['dateTimeIn'];
$dateTimeOut = $_POST['dateTimeOut'];
//FORMATTTED DATE FOR SQL
$dateTimeInFormatted = date("Y-m-d H:i:s", strtotime($dateTimeIn));
$dateTimeOutFormatted = date("Y-m-d H:i:s", strtotime($dateTimeOut));

$loggedInUser = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;

if ($loggedInUser && isset($loggedInUser->title, $loggedInUser->lname, $loggedInUser->fname, $loggedInUser->mname, $loggedInUser->DatabaseID)) {
    $title = $loggedInUser->title;
    $lname = $loggedInUser->lname;
    $fname = $loggedInUser->fname;
    $mname = $loggedInUser->mname;
    $DatabaseID = $loggedInUser->DatabaseID;

    $currentLoggedInEncoder = "$title $lname, $fname $mname | ID: $DatabaseID";
    $currentLoggedInEncoderID = $DatabaseID;
} else {
    // Handle the case when $loggedInUser is null or missing properties
    $currentLoggedInEncoder = "Guest"; // Provide a default value or handle as needed
    $currentLoggedInEncoderID = null; // Provide a default value or handle as needed
}
function executeQuery($conn, $query)
{
    $result = $conn->query($query);
    return $result->num_rows > 0 ? $result->fetch_assoc() : 0;
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// -----------------------------------------------------------
// Get total net amount
$queryTotalNet = "SELECT SUM(NetAmt) AS total_net_amount FROM sales_tb WHERE createDate BETWEEN '$dateTimeInFormatted' AND '$dateTimeOutFormatted'";
$totalNetAmount = executeQuery($conn, $queryTotalNet);
// Calculate total cash amount
$queryTotalCash = "SELECT SUM(NetAmt) - SUM(CASE WHEN ChangeAmt < 0 THEN ChangeAmt ELSE 0 END) AS total_Cash FROM sales_tb";
$totalCashAmount = executeQuery($conn, $queryTotalCash);

?>

<head>
    <div class="d-flex justify-content-between  py-2 mb-3  w-100">
        <!-- Left Column -->
        <div class="d-flex align-items-center">
            <img style="height: 60px;" src="../img/logo.png" alt="ZARATE LOGO">
            <div class="mx-3 d-flex flex-column justify-content-end">
                <h5 class="fw-bold mb-1">E. Zarate Hospital</h5>
                <h6 class="text-muted">16 J. Aguilar Avenue, Talon, Las Piñas City,<br />Metro Manila, Philippines 1747</h6>
            </div>
        </div>

        <!-- Right Column -->
        <div class="d-flex flex-column align-items-end">
            <div style="margin-right: 15px;">
                <h6 class="fw-bold mb-1">CLOSING REPORT AS OF: <?php echo date("D, M d Y"); ?></h6>

                <?php
                // Convert $dateTimeIn to day name and AM/PM time format
                $dateTimeIn =  date("l, h:i A", strtotime($dateTimeIn));
                // Convert $dateTimeOut to day name and AM/PM time format
                $dateTimeOut = date("l, h:i A", strtotime($dateTimeOut));
                ?>
                <h6 class='text-muted'>Shift Starts: <?php echo $dateTimeIn; ?></h6>
                <h6 class='text-muted'>Shift Ends: <?php echo $dateTimeOut; ?></h6>
                <h6 class='text-muted'>Shift Of: <?php echo $currentLoggedInEncoder ?></h6>
            </div>
            <!-- You can add more content to the right column here -->
        </div>
    </div>

    <title>Closing Report</title>
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
    <div class="table-fluid">
        <div class="border-bottom border-2 border-secondary">
            <div class="row">
                <!-- Left Column -->
                <div class="col">
                    <span>CASH TRANSACTION:</span>
                </div>
                <!-- Right Column -->
                <div class="col text-end fw-bold">
                    <h6>NET TOTAL: ₱ <?= number_format($totalNetAmount['total_net_amount'] ?? 0, 2); ?> </h6>
                </div>
            </div>
        </div>
        <table id="example" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Charge Slip Number</th>
                    <th>Time</th>
                    <th>Payment Type</th>
                    <th>Patient Type</th>
                    <th>Account Name</th>
                    <th>Net Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT *, DATE_FORMAT(sales_tb.createDate, '%h:%i %p') AS createTime,
                patient_tb.lname AS patientLastName ,
                patient_tb.fname AS patientFirstName ,
                patient_tb.mname AS patienMiddleName 
                FROM sales_tb
                LEFT JOIN patient_tb ON sales_tb.PatientAcct = patient_tb.hospistalrecordNo  
                WHERE sales_tb.createDate BETWEEN '$dateTimeInFormatted' AND '$dateTimeOutFormatted'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['SalesID'] . "</td>";
                        echo "<td>" . $row['createTime'] . "</td>";
                        echo "<td>" . (($row['billingID'] == 0 || $row['billingID'] === null) ? "Cash" : $row['UnpaidPatientName']) . "</td>";
                        echo "<td>" . $row['PatientType'] . "</td>";
                        echo "<td>" . (($row['billingID'] != 0 && $row['billingID'] !== null)? $row['patientLastName'] . ' . ' . $row['patienMiddleName'] . ' ' . $row['patientFirstName']: $row['UnpaidPatientName']) . "</td>";"</td>";
                        echo "<td>₱ " . number_format($row['NetAmt'], 2) . "</td>";
                        // Add more columns here if needed
                        echo "</tr>";
                    }
                    mysqli_free_result($result); // Free the result set
                } else {
                    echo "No records found."; // Handle no records case
                    echo $dateTimeIn . '.' . $dateTimeOut;
                }

                // Close the database connection
                mysqli_close($conn);
                ?>


            </tbody>
        </table>

    </div>
    <div class="container-fluid border border-dark py-1">
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