<?php
session_start();
require_once '../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {
    // Retrieve form inputs
    $selectedServices = $_POST['services_table'];
    $RequestedName = $_POST['doctor_name'];
    $patientHospitalRecordNo = $_POST['patientHospitalRecordNo'];
    $remarks = $_POST['additional_info'];

    $lastTwoDigits = substr($RequestedName, -2);

    // Check if the patient already exists
    if ($patientHospitalRecordNo) {
        die();
        $checkQuery = "SELECT hospitalRecordNo FROM patient_tb WHERE hospitalRecordNo = '$patientHospitalRecordNo'";
        $checkResult = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($checkResult) <= 0) { // patient has no record
            // insert the new patient
            $patientLastname = $_POST['patientLastname'];
            $patientFirstname = $_POST['patientFirstname'];
            $patientMiddlename = $_POST['patientMiddlename'];
            $patientBdate = $_POST['patientBdate'];
            $patientAge = $_POST['patientAge'];
            $patientGender = $_POST['patientGender'];
            $insertPatientQuery = "INSERT INTO `patient_tb` (`hospistalrecordNo`, `lname`, `fname`, `mname`, `age`, `gender`, `bDate`) VALUES ('$patientHospitalRecordNo','$patientLastname','$patientLastname','$patientMiddlename','$patientAge','$patientGender');";
            $insertPatientResult = mysqli_query($conn, $insertPatientQuery);

            $resultInsertPatient = mysqli_query($conn, $insertPatientQuery);
            if (!$resultInsertPatient) {
                $_SESSION["alert_message"] = "Failed to insert data into the database. Error Details: " . mysqli_error($conn);
                $_SESSION["alert_message_error"] = true;
                header("Location: ./index.php");
                die();
            }
        }
    }



    // Create the INSERT query
    $insertQuery = "INSERT INTO services_tb ( Services, RequestedName, PatientName, remarks)
                    VALUES ( '$selectedServices', '$lastTwoDigits', '$patientHospitalRecordNo', '$remarks')";

    // Execute the query
    $result = mysqli_query($conn, $insertQuery);

    // Check if the insertion was successful
    if (!$result) {
        $_SESSION["alert_message"] = "Failed to insert data into the database. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
        header("Location: ../services/index.php");
        die();
    }

    // Success
    $_SESSION["alert_message"] = "Requested  successfully.";
    $_SESSION["alert_message_success"] = true;

    // Redirect after processingw
    header("Location: ../services/index.php");
    die();
}

// Close the database connection
$conn->close();
