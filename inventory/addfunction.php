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
    $itemCode = $_POST['item_code'];
    $type = $_POST['type'];
    $unit = $_POST['Unit'];
    $description = $_POST['description'];
    $generic = $_POST['Generic'];
    $sugPrice = $_POST['Sugprice'];
    $mwPrice = $_POST['MWprice'];
    $ipdPrice = $_POST['IPDprice'];
    $ppriceUse = $_POST['Ppriceuse'];

    $sql = "INSERT INTO inventory_tb (itemCode, Type, Unit, Description, Generic, SugPrice, MWprice, IPDprice, Ppriceuse)
    VALUES ('$itemCode', '$type', '$unit', '$description', '$generic', '$sugPrice', '$mwPrice', '$ipdPrice', '$ppriceUse')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Data inserted successfully!");</script>';
    } else {
        echo '<script>alert("Error: Data insertion failed.");</script>';
    }
}

// Close the database connection
$conn->close();
?>
