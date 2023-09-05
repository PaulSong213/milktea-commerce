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
    header("Location: .s/index.php");
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
$cashAmmountTendered = $_POST['cashAmmountTendered'];
$changeAmt = $_POST['changeAmt'];

// CHEQUE
$bankName = $_POST['bankName'];
$checkNo = $_POST['checkNo'];
$checkDate = $_POST['checkDate'];
$checkAmount = $_POST['checkAmount'];

$insertPaymentQuery = "INSERT INTO `payment_tb` (`billID`, `chargeID`, `receivedID`, `dateTimePaid`, `modifiedDate`, `paymentType`, `type`, `cashAmmountTendered`, `changeAmt`, `bankName`, `checkNo`, `checkDate`, `checkAmount`) 
VALUES ('$billID', '$chargeID', '$receivedByID', '$formattedDatetimePaid', current_timestamp(), '$modeOfPayment', '$type', '$cashAmmountTendered', '$changeAmt', '$bankName', '$checkNo', '$checkDate', '$checkAmount');";

$result = mysqli_query($conn, $insertPaymentQuery);
if ($result) {

    if ($type == 'charge') {
        // TODO: Handle check payment
        $chargeChange =
            $updateChargeQuery = "UPDATE `sales_tb` 
        SET `AmtTendered` = (AmtTendered + '$cashAmmountTendered'), 
        `ChangeAmt` = (ChangeAmt - ('$cashAmmountTendered')), 
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
        //bill
        $getChargeFromBillQuery = "SELECT * FROM `sales_tb` WHERE `billID` = '$billID' AND (`ChangeAmt` < 0);";

        $toPayBalance = $cashAmmountTendered;
        if ($modeOfPayment == 'check') $toPayBalance = $checkAmount;
        $result = mysqli_query($conn, $getChargeFromBillQuery);
        $lastInsertedChargeID = null;
        while ($row = $fetch_assoc($result)) {
            $lastInsertedChargeID = $row['chargeID'];
            $remainingBalance = $row['ChangeAmt'];
            $changeAmt = 0;

            $remainingBalance = $toPayBalance - $remainingBalance;
            $toPayBalance -= $remainingBalance;

            if ($remainingBalance > 0) $remainingBalance = 0; // payment is greater than charge

            $updateChargeQuery = "UPDATE `sales_tb` 
            SET `AmtTendered` = '$remainingBalance', 
            `ChangeAmt` = 0, 
            `modifiedDate` = current_timestamp()
            WHERE `sales_tb`.`SalesID` = '$lastInsertedChargeID';";

            $result = mysqli_query($conn, $updateChargeQuery);
            if (!$result) {
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
