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

$amountTendered = $cashAmountTendered;
if ($modeOfPayment == 'check') $amountTendered = $checkAmount;

$amountPaid = 0; // total amount lessen

if ($type == 'charge') {

    $updateChargeQuery = "UPDATE `sales_tb` 
        SET `AmtTendered` = (AmtTendered + $amountTendered), 
        `ChangeAmt` = (ChangeAmt + '$amountTendered'), 
        `modifiedDate` = current_timestamp()
        WHERE SalesID = '$chargeID' 
        AND ChangeAmt < 0;";
    $result = mysqli_query($conn, $updateChargeQuery);
    if (!$result) {
        $_SESSION["alert_message"] = "Failed to Enter Payment. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    // there is no remaining balance left
    if (mysqli_affected_rows($conn) <= 0) {
        $_SESSION["alert_message"] = "Selected Charge #$chargeID has no remaining Balance. Payment transaction is not recorded.";
        $_SESSION["alert_message_error"] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
} else {

    //bill
    $toPayBalance = $amountTendered;
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
        $AmtTendered = $row['AmtTendered'];

        if ($toPayBalance <= 0) break;

        if ($remainingBalance == $toPayBalance) {
            $AmtTendered += $remainingBalance;
            $remainingBalance = 0;
            $toPayBalance = 0;
        } else if ($toPayBalance > $remainingBalance) {
            $AmtTendered += $remainingBalance;
            $toPayBalance = $toPayBalance - $remainingBalance;
            $remainingBalance = 0;
        } else {
            $AmtTendered += $toPayBalance;
            $remainingBalance =  $toPayBalance - $remainingBalance;
            $toPayBalance = 0;
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

    // there is no remaining balance left
    if ($lastInsertedChargeID == null) {
        $_SESSION["alert_message"] = "Selected Bill #$billID has no remaining Balance. Payment transaction is not recorded.";
        $_SESSION["alert_message_error"] = true;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    // record the change
    if ($toPayBalance > 0) {
        $changeAmt = $toPayBalance;
        $updateChangeQuery = "UPDATE `sales_tb` 
            SET `ChangeAmt` = '$toPayBalance', 
            `AmtTendered` = AmtTendered + $toPayBalance,
            `modifiedDate` = current_timestamp()
            WHERE `sales_tb`.`SalesID` = '$lastInsertedChargeID';";
        $resultChangeQuery = mysqli_query($conn, $updateChangeQuery);
        if (!$resultChangeQuery) {
            $_SESSION["alert_message"] = "Failed to Enter Payment. Error Details: " . mysqli_error($conn);
            $_SESSION["alert_message_error"] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }
}
if ($changeAmt < 0) $changeAmt = 0;
// insert payment transaction history
$insertPaymentQuery = "INSERT INTO `payment_tb` (`billID`, `chargeID`, `receivedID`, `dateTimePaid`, `modifiedDate`, `paymentType`, `type`, `cashAmountTendered`, `changeAmt`, `bankName`, `checkNo`, `checkDate`, `checkAmount`) 
VALUES ('$billID', '$chargeID', '$receivedByID', '$formattedDatetimePaid', current_timestamp(), '$modeOfPayment', '$type', '$cashAmountTendered', '$changeAmt', '$bankName', '$checkNo', '$checkDate', '$checkAmount');";
$result = mysqli_query($conn, $insertPaymentQuery);
if (!$result) {
    $_SESSION["alert_message"] = "Failed to Save Payment History. Error Details: " . mysqli_error($conn);
    $_SESSION["alert_message_error"] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

// save insert id to print
$insertedPaymentID = $conn->insert_id;
$_SESSION["printPaymentInsertedId"] = $insertedPaymentID;

// success
$_SESSION["alert_message"] = "Successfully Entered Payment";
$_SESSION["alert_message_success"] = true;


header('Location: ' . $_SERVER['HTTP_REFERER']);
die();
