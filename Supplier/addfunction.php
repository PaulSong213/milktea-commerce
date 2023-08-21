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
   
    $Sname = $_POST['supplier_name'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNum'];
    $faxNumber = $_POST['faxNum'];
    $CelNumber = $_POST['celNum'];
    $contactNumber = $_POST['contactNum'];
    $note = $_POST['Snote'];
    

    $sql = "INSERT INTO supplier_tb (supplier_name,address, telNum, faxNum,celNum,contactNum,Snote)
    VALUES ('$Sname','$address', '$telNumber', '$faxNumber', '$CelNumber', '$contactNumber', '$note')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Item";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Item. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}


// Close the database connection
$conn->close();
?>
