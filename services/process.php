<?php
// Include the connection file
require_once '../php/connect.php';

// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST['SaveItem'])) {
    // Retrieve form data
    $services = $_POST['table'];
    $RequestedName = $_POST['doctor_name'];
    $patientHospitalRecordNo = $_POST['patientHospitalRecordNo'];
    $remarks = $_POST['additional_info'];
    $department = $_POST['department'];
    $ChiefComplaint = $_POST['Chief_Complaint'];
    $WorkingDX = $_POST['Working_DX'];
    $EnteredBy = $_POST['EnteredBy'];
    $ChargeNo = $_POST['ChargeNo'];
    $reason = $_POST['reason'];

    // Extract the last two digits from RequestedName
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
    // Define the SQL query
    $insertQuery = "INSERT INTO services_tb (Services, RequestedName, PatientName, remarks, departmentID, ChiefComplaint, WorkingDX, EnteredBy, ChargeNo, reason, Date)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    // Prepare the SQL statement
    $stmt = $conn->prepare($insertQuery);


    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Error in preparing the statement: " . $conn->error);
    } else {
        $_SESSION["alert_message"] = "Requested Inserted successfully.";
        $_SESSION["alert_message_success"] = true;
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssisssss", $services, $RequestedName, $PatientName, $remarks, $department, $ChiefComplaint, $WorkingDX, $EnteredBy, $ChargeNo, $reason);

    // Execute the statement
    if ($stmt->execute()) {
        // Success: Redirect with success message
        $_SESSION["alert_message"] = "Requested successfully.";
        $_SESSION["alert_message_success"] = true;

        $stmt->close();
        $conn->close();
        header("Location: ../services/index.php");
        die();
    } else {
        // Error: Redirect with error message
        $_SESSION["alert_message"] = "Failed to insert data into the database. Error Details: " . $stmt->error;
        $_SESSION["alert_message_error"] = true;
        $stmt->close();
        $conn->close();
        header("Location: ../services/index.php");
        die();
    }
} else {
    // Redirect to the appropriate page if the form was not submitted
    $_SESSION["alert_message"] = "Failed to submit form data ";
    $_SESSION["alert_message_error"] = true;
    header("Location: ../services/index.php");
    die();
}

// Close the database connection
$conn->close();
