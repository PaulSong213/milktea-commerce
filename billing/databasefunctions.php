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
    $unit = $_POST['unit'];
    $subtotal = $_POST['subtotal'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $disc_percent = $_POST['disc_percent'];
    $disc_amt = $_POST['disc_amt'];
    $id = $_POST['id'];
    $ItemType = $_POST['itemType'];
    $ItemTypeID = $_POST['itemTypeID'];

    for ($i = 0; $i < count($product_id); $i++) {
        $productInfoArray[] = [

            "subtotal" => $subtotal[$i],
            "product_id" => $product_id[$i],
            "qty" => $qty[$i],
            "price" => $price[$i],
            "disc_percent" => $disc_percent[$i],
            "disc_amt" => $disc_amt[$i],
            "id" => $id[$i],
            "unit" => $unit[$i],
            "itemType" => $ItemType[$i],
            "itemTypeID" => $ItemTypeID[$i]
        ];
    }

    // Encode the array as JSON
    $productInfoJSON = json_encode($productInfoArray);

    // Calculate additional discount amount
    $addDiscAmt = $netSale * ($additionalDiscount / 100);

    // Prepare the INSERT query
    $insertQuery = "INSERT INTO sales_tb (ProductInfo, NetSale, AddDisc, AddDiscAmt, NetAmt, AmtTendered, ChangeAmt, PatientAcct, RequestedName, EnteredName, createDate)
                    VALUES ('$productInfoJSON', '$netSale', '$additionalDiscount', '$addDiscAmt', '$netAmount', '$amountTendered', '$change', '$patientAccountName', '$requestedByName', '$enteredByName', NOW())";

    // Execute the query and handle the result
    $result = mysqli_query($conn, $insertQuery);
    if ($result) {
        // Success
        $_SESSION["alert_message"] = "Successfully Added an Billing Statement.";
        $_SESSION["alert_message_success"] = true;

        // get the data of the last inserted row
        $last_id = mysqli_insert_id($conn);
        $sql =  "SELECT * FROM sales_tb WHERE SalesID=$last_id";
        $result = $conn->query($sql);
        $printData = $result->fetch_assoc();
        $_SESSION['printData'] = $printData;
    } else {
        $_SESSION["alert_message"] = "Failed to Add a Billing Statement. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    // Redirect after processing
    header("Location: ../billing/index.php");
    die();
}

// Close the database connection
$conn->close();
