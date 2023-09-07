<?php
// Include the database connection script here
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Include the database connection code here
    require_once '../../php/connect.php';
    $conn = connect();

    // Assuming your form fields are named 'field1' and 'field2'
    $encoderID = $_POST['encoderID'];
    $patientID = $_POST['patientID'];
    $accountOfID = $_POST['accountOfID'];
    $type = $_POST['type'];


    $dateAdmitted = $_POST['dateAdmitted'];
    $timeAdmitted = $_POST['timeAdmitted'];
    $formattedDatetimeAdmitted = null;
    if (!empty($timeAdmitted) && !empty($dateAdmitted)) {
        $datetimeAdmitted = new DateTime($dateAdmitted . ' ' . $timeAdmitted);
        $formattedDatetimeAdmitted = $datetimeAdmitted->format('Y-m-d H:i:s');
    }

    $attendingPhysicianID = $_POST['attendingPhysicianID'];
    $admittingPhysicianID = $_POST['admittingPhysicianID'];

    $dateDischarged = $_POST['dateDischarged'];
    $timeDischarged = $_POST['timeDischarged'];
    $formattedDatetimeDischarged = null;
    if (!empty($dateDischarged) && !empty($timeDischarged)) {
        $datetimeDischarged = new DateTime($dateDischarged . ' ' . $timeDischarged);
        $formattedDatetimeDischarged = $datetimeDischarged->format('Y-m-d H:i:s');
    }


    $query = "INSERT INTO `billing_tb` 
    (`encoderID`, `patientID`, `accountOfID`, `dateTimeAdmitted`, `type`, `attendingPhysicianID`, `admittingPhysicianID`, `dateTimeDischarged`) 
    VALUES ('$encoderID', '$patientID', '$accountOfID', '$formattedDatetimeAdmitted', '$type', '$attendingPhysicianID', '$admittingPhysicianID', '$formattedDatetimeDischarged');";

    $result = mysqli_query($conn, $query);
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Billing";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Billing. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
