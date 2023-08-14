<?php
// Database configuration
$host = 'localhost';
$dbName = 'zaratehospital';
$username = 'root';
$password = '';


// Establish a database connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {
    $itemTypeCode = $_POST['itemTypeCode'];
    $description = $_POST['description'];

    $sql = "INSERT INTO itemtype_tb (itemTypeCode, description)
    VALUES ('$itemTypeCode', '$description')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../index.php");
        die();
    } else {
        header("Location: ../index.php");
        die();
    }
}

// Close the database connection
$conn->close();
