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
$TotalNetquery="SELECT SUM(cashAmountTendered)-SUM(changeAmt> 0) + SUM(checkAmount)-SUM(changeAmt > 0)   AS total_net_amount FROM payment_tb 
WHERE checkDate BETWEEN '$dateTimeInFormatted' AND '$dateTimeOutFormatted'";
function calculateTotalNetAmount($conn, $query) {
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total_net_amount'];
    } else {
        return 0; // Return 0 or handle the error as needed
    }
}

// Call the function to get the total net amount
$totalNetAmount = calculateTotalNetAmount($conn, $TotalNetquery);

// $cashquery="SELECT SUM(cashAmountTendered)-SUM(changeAmt > 0) FROM payment_tb WHERE paymentType = 'cash' ";
// $Checkquery="SELECT SUM(checkAmount)-SUM(changeAmt > 0) FROM payment_tb WHERE paymentType = 'check'";
// $billquery = "SELECT SUM(cashAmountTendered)-SUM(changeAmt> 0) + SUM(checkAmount)-SUM(changeAmt > 0)  FROM payment_tb WHERE type = 'bill' ";
// $NYPquery = "SELECT SUM(cashAmountTendered)-SUM(changeAmt> 0) + SUM(checkAmount)-SUM(changeAmt > 0)  FROM payment_tb WHERE type = 'charge' ";

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
                <h6>NET TOTAL: ₱ <?= number_format($totalNetAmount ?? 0, 2); ?> </h6>
                </div>
            </div>
        </div>
        <table id="example" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Chargeslip Number</th>
                    <th>Time</th>
                    <th>Payment Type</th>
                    <th>Transaction Type</th>
                    <th>Account Name</th>
                    <th>Net Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT payment_tb.*, sales_tb.*, patient_tb.lname AS sales_lname, 
    billing_patient.lname AS billing_patient_lname,  -- Select the lname for billing_patient
    DATE_FORMAT(payment_tb.checkDate, '%h:%i %p') AS createTime
    FROM payment_tb
    LEFT JOIN sales_tb ON payment_tb.chargeID = sales_tb.salesID
    LEFT JOIN billing_tb ON payment_tb.billID = billing_tb.billingID
    LEFT JOIN patient_tb ON patient_tb.HospistalrecordNo = sales_tb.patientAcct
    LEFT JOIN patient_tb AS billing_patient ON billing_patient.HospistalrecordNo = billing_tb.patientID
    WHERE payment_tb.checkDate BETWEEN '$dateTimeInFormatted' AND '$dateTimeOutFormatted'
    ";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['paymentID'] . "</td>";
                        echo "<td>" . $row['createTime'] . "</td>";
                        echo "<td>" . $row['paymentType'] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        // Check the value of 'type' and output the appropriate 'lname'
                        if ($row['type'] == 'bill') {
                            echo "<td>" . $row['billing_patient_lname'] . "</td>"; // Output billing_patient's lname
                        } elseif ($row['type'] == 'charge') {
                            echo "<td>" . $row['sales_lname'] . "</td>"; // Output sales_lname
                        } else {
                            // Handle other cases if needed
                            echo "<td>ERROR</td>";
                        }
                        "</td>";
                        if ($row['paymentType'] == 'check') {
                            echo "<td>₱ " . number_format($row['checkAmount'] - $row['changeAmt'], 2) . "</td>";
                        } else {
                            echo "<td>₱ " . number_format($row['cashAmountTendered'] - $row['changeAmt'], 2) . "</td>";
                            
                        }
                        // Add more columns here if needed
                        echo "</tr>";
                    }
                    mysqli_free_result($result); // Free the result set
                } else {
                    echo "No records found. <br>"; // Handle no records case
                    echo $dateTimeIn . '.' . $dateTimeOut;
                }
                // Close the database connection
                mysqli_close($conn);
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
</body>

</html>