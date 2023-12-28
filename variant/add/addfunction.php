<?php
session_start();
require_once '../../php/connect.php';

// Assuming that 'connect()' function returns a valid MySQLi connection
$conn = connect();

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $userDepartment = $userData['departmentName'];
} else {
    // Handle the case when the user is not logged in (redirect, show an error, etc.)
    header("Location: login.php");
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['SaveItem'])) {
    // Sanitize user inputs to prevent SQL injection
    $itemTypeCode = mysqli_real_escape_string($conn, $_POST['sizeName']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
  
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $itemType = mysqli_real_escape_string($conn, $_POST['itemTypeID']);
   


    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO variant_tb (variantName, description, price, productID)
                            VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $itemTypeCode, $description, $price, $itemType);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // success
        $act = "Add New Item Type";
        $description = "Add Item Type Data [$itemTypeCode]";

        // Use prepared statements for the second query
        $stmt1 = $conn->prepare("INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
                                VALUES (?, ?, ?, NOW())");
        $stmt1->bind_param("iss", $userID, $act, $description);
        $stmt1->execute();

        $_SESSION["alert_message"] = "Successfully Added an Item Type";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Add an Item Type. Error Details: " . $stmt->error;
        $_SESSION["alert_message_error"] = true;
    }

    // Close the prepared statement
    $stmt->close();
    $stmt1->close();
}

// Close the database connection
$conn->close();

// Redirect to the index page
header("Location: ../index.php");
exit();
