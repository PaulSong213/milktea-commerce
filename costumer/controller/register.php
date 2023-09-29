<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../php/connect.php';
    $conn = connect();

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get values from the form
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNumber = $_POST["phoneNumber"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $region = $_POST["region"];
    $province = $_POST["province"];
    $municipality = $_POST["municipality"];
    $barangay = $_POST["barangay"];
    $otherAddress = $_POST["otherAddress"];

    $shippingAddress = $region . ", " . $province . ", " . $municipality . ", " . $barangay . ", " . $otherAddress;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL statement to insert data into the table
    $sql = "INSERT INTO costumer_tb (firstName, lastName, email, password, phoneNumber, dateOfBirth, shippingAddress)
            VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$phoneNumber', '$dateOfBirth', '$shippingAddress')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["alert_message"] = "Successfull Registration! You can now login to your account.";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Employee. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    // Close the database connection
    $conn->close();

    header("Location: /milktea-commerce/costumer/login.php");
}
