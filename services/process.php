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
    $PatientName = $_POST['patient_name'];
    $remarks = $_POST['additional_info'];

    $lastTwoDigits = substr($RequestedName, -2);

    // Create the INSERT query
    $insertQuery = "INSERT INTO services_tb ( Services, RequestedName, PatientName, remarks)
                    VALUES ( '$selectedServices', '$lastTwoDigits', '$PatientName', '$remarks')";

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
?>
