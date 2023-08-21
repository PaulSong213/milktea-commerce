 
<?php
require_once '../../php/connect.php';
session_start();
$conn = connect();

if (isset($_POST['SaveItem'])) {
   
    $itemTypeID = $_POST['itemTypeID'];
    
    $Sname = $_POST['supplier_name'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNum'];
    $faxNumber = $_POST['faxNum'];
    $CelNumber = $_POST['celNum'];
    $contactNumber = $_POST['contactNum'];
    $note = $_POST['Snote'];
    
    $sql = "UPDATE supplier_tb
    SET
    supplier_name = '$Sname',
    address = '$address',
    telNum  = '$telNumber',
    faxNum  = '$faxNumber',
    celNum  = '$CelNumber',
    contactNum = '$contactNumber',
    Snote = '$note'
    
    WHERE
    itemTypeID = '$supplier_code';
    ";

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
