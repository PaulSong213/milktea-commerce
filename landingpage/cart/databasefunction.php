<?php
// Include the connection file
require_once '../php/connect.php';
session_start();
// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $orders = $_POST['orders'];
    $shippingAddress = $_POST['shippingAddress'];
    $paymentMethod = $_POST['paymentMethod'];
    
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
    $stmt->bind_param("ssssisssss", $services, $RequestedName, $patientHospitalRecordNo, $remarks, $department, $ChiefComplaint, $WorkingDX, $EnteredBy, $ChargeNo, $reason);

    // Execute the statement
    if ($stmt->execute()) {

        // Success: Redirect with success message
        $_SESSION["alert_message"] = "Requested successfully.";
        $_SESSION["alert_message_success"] = true;
        $_SESSION["printServiceFormId"] = $conn->insert_id;
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
