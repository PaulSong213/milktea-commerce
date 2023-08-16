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
    $chargeSlipNumber = $_POST['chargeSlipNumber'];
    $patientAccountName = $_POST['patientAccountName'];
    $requestedByName = $_POST['requestedByName'];
    $enteredByName = $_POST['enteredByName'];
    $netSale = $_POST['netSale'];
    $additionalDiscount = $_POST['additionalDiscount'];
    $netAmount = $_POST['netAmount'];
    $amountTendered = $_POST['amountTendered'];
    $change = $_POST['change'];

    // Create the array for ProductInfo column
    $productInfoArray = [];
    $subtotal = $_POST['subtotal'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $disc_percent = $_POST['disc_percent'];
    $disc_amt = $_POST['disc_amt'];

    for ($i = 0; $i < count($product_id); $i++) {
        $productInfoArray[] = [
            "subtotal" => $subtotal[$i],
            "product_id" => $product_id[$i],
            "qty" => $qty[$i],
            "price" => $price[$i],
            "disc_percent" => $disc_percent[$i],
            "disc_amt" => $disc_amt[$i]
        ];
    }

    // Encode the array as JSON
    $productInfoJSON = json_encode($productInfoArray);

    // Calculate additional discount amount
    $addDiscAmt = $netSale * ($additionalDiscount / 100);

    // Prepare the INSERT query
    $insertQuery = "INSERT INTO sales_tb (ProductInfo,NetSale, AddDisc, AddDiscAmt, NetAmt, AmtTendered, ChangeAmt, PatientAcct, RequestedName, EnteredName, createDate)
                    VALUES ('$productInfoJSON','$netSale','$additionalDiscount','$addDiscAmt','$netAmount','$amountTendered','$change','$patientAccountName','$requestedByName','$enteredByName', now())";
    
    // Fix the query execution
    $result = mysqli_query($conn, $insertQuery); // Change $sql to $insertQuery
    if ($result) {
        // success
        $_SESSION["alert_message"] = "Successfully Added an Item";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Add an Item. Error Details: " . mysqli_error($conn); // Fix the error message
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../billing/index.php");
    die();
}

// Close the database connection
$conn->close();
?>
