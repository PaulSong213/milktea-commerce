<?php

session_start();
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// allow only POST requests
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $_SESSION["alert_message"] = "POST request is required";
    $_SESSION["alert_message_error"] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

$type = $_POST['type'];
$chargeID = $_POST['chargeID'];
$billID = $_POST['billID'];
$receivedByID = $_POST['receivedByID'];
$modeOfPayment = $_POST['modeOfPayment'];

// Date time paid
$datePaid = $_POST['datePaid'];
$timePaid = $_POST['timePaid'];
$formattedDatetimePaid = null;
if (!empty($datePaid) && !empty($timePaid)) {
    $datetimePaid = new DateTime($datePaid . ' ' . $timePaid);
    $formattedDatetimePaid = $datetimePaid->format('Y-m-d H:i:s');
}

// CASH
$cashAmountTendered = $_POST['amountTendered'];
$changeAmt = $_POST['changeAmt'];

// CHEQUE
$bankName = $_POST['bankName'];
$checkNo = $_POST['checkNo'];
$checkDate = $_POST['checkDate'];
$checkAmount = $_POST['checkAmount'];

$insertPaymentQuery = "INSERT INTO `payment_tb` (`billID`, `chargeID`, `receivedID`, `dateTimePaid`, `modifiedDate`, `paymentType`, `type`, `cashAmountTendered`, `changeAmt`, `bankName`, `checkNo`, `checkDate`, `checkAmount`) 
VALUES ('$billID', '$chargeID', '$receivedByID', '$formattedDatetimePaid', current_timestamp(), '$modeOfPayment', '$type', '$cashAmountTendered', '$changeAmt', '$bankName', '$checkNo', '$checkDate', '$checkAmount');";

$result = mysqli_query($conn, $insertPaymentQuery);
if ($result) {

    // TODO: Handle check payment
    $amountTendered = $cashAmountTendered;
    if ($modeOfPayment == 'check') $amountTendered = $checkAmount;

    if ($type == 'charge') {
        $updateChargeQuery = "UPDATE `sales_tb` 
        SET `AmtTendered` = (AmtTendered + $amountTendered), 
        `ChangeAmt` = (ChangeAmt + '$amountTendered'), 
        `modifiedDate` = current_timestamp()
        WHERE `sales_tb`.`SalesID` = '$chargeID';";
        $result = mysqli_query($conn, $updateChargeQuery);
        if (!$result) {
            $_SESSION["alert_message"] = "Failed to Enter Payment. Error Details: " . mysqli_error($conn);
            $_SESSION["alert_message_error"] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    } else {
        $toPayBalance = $amountTendered;
        //bill
        $getChargeFromBillQuery = "SELECT * FROM `sales_tb` WHERE `billingID` = '$billID' AND (`ChangeAmt` < 0);";
        $resultChargeFromBill = mysqli_query($conn, $getChargeFromBillQuery);
        if (!$resultChargeFromBill) {
            $_SESSION["alert_message"] = "Failed to Enter Payment. Error Details: " . mysqli_error($conn);
            $_SESSION["alert_message_error"] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
        $lastInsertedChargeID = null;
        // fetch all charge slips
        while ($row = $resultChargeFromBill->fetch_assoc()) {
            $lastInsertedChargeID = $row['SalesID'];
            $remainingBalance = $row['ChangeAmt'] * -1; // Make it positive
            $AmtTendered = $toPayBalance;

            if ($remainingBalance >= $toPayBalance) {
                $remainingBalance = $remainingBalance - $toPayBalance;
                $remainingBalance *= -1;
                $toPayBalance = 0;
            } else {
                $AmtTendered = $remainingBalance;
                $toPayBalance = $toPayBalance - $remainingBalance;
                $remainingBalance = 0;
            }

            $updateChargeQuery = "UPDATE `sales_tb` 
            SET `AmtTendered` = '$AmtTendered', 
            `ChangeAmt` = '$remainingBalance', 
            `modifiedDate` = current_timestamp()
            WHERE `sales_tb`.`SalesID` = '$lastInsertedChargeID';";

            $resultChargeQuery = mysqli_query($conn, $updateChargeQuery);
            if (!$resultChargeQuery) {
                $_SESSION["alert_message"] = "Failed to Enter Payment. Error Details: " . mysqli_error($conn);
                $_SESSION["alert_message_error"] = true;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
    }

    // success
    $_SESSION["alert_message"] = "Successfully Entered Payment";
    $_SESSION["alert_message_success"] = true;
} else {
    $_SESSION["alert_message"] = "Failed to Enter Payment. Error Details: " . mysqli_error($conn);
    $_SESSION["alert_message_error"] = true;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
die();
