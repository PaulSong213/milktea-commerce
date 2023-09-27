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
    $CostumerName = $_POST["CostumerName"];
    $enteredByName = $_POST['enteredByName'];
    $netSale = $_POST['netSale'];
    $additionalDiscount = $_POST['additionalDiscount'];
    $netAmount = $_POST['netAmount'];
    $amountTendered = $_POST['amountTendered'];
    $change = $_POST['change'];
    $billingID = null;
    $paymentType = "cash";

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
    $product_desciption = $_POST['product_desciption'];

    for ($i = 0; $i < count($product_id); $i++) {
        if (empty($product_id[$i])) continue;
        $qtyValue = ($qty[$i] === null || $qty[$i] <= 0) ? 1 : $qty[$i];

        $productInfoArray[] = [
            "subtotal" => $subtotal[$i],
            "product_id" => $product_id[$i],
            "qty" => $qtyValue,
            "price" => $price[$i],
            "id" => $id[$i],
            "unit" => $unit[$i],
            "itemType" => $ItemType[$i],
            "itemTypeID" => $ItemTypeID[$i],
            "product_desciption" => $product_desciption[$i]
        ];
    }

    // Encode the array as JSON
    $productInfoJSON = json_encode($productInfoArray);

    // Calculate additional discount amount
    $addDiscAmt = $netSale * ($additionalDiscount / 100);

    // Prepare the INSERT query
    $insertQuery = "INSERT INTO orders_tb (ProductInfo, NetSale, AddDisc, AddDiscAmt, NetAmt, AmtTendered, ChangeAmt, EnteredName,  createDate,  CostumerName,modeOfPayment, PaymentID, status)
    VALUES ('$productInfoJSON', '$netSale', '$additionalDiscount', '$addDiscAmt', '$netAmount', '$amountTendered', '$change', '$enteredByName', NOW(), '$CostumerName','walk-in',NULL, 'delivered')";

    // Validate the productInfoArray
    if (empty($productInfoArray)) {
        $_SESSION["alert_message"] = "Please fill Product information on the cart.";
        $_SESSION["alert_message_error"] = true;
        header("Location: ../billing_slip/index.php");
        die();
    }
    $result = mysqli_query($conn, $insertQuery);

    // Inserting to the sales_tb failed
    if (!$result) {
        $_SESSION["alert_message"] = "Failed to Add a Walk IN transaction: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
        header("Location: ../billing_slip/index.php");
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        die();
    }

    // get the data of the last inserted row
    $salesInsertedId = mysqli_insert_id($conn);

    // Minus the quantity of the products in the inventory
    // Update inventory quantities
    for ($i = 0; $i < sizeof($productInfoArray); $i++) {
        $productInfo = $productInfoArray[$i];
        $toEditProductID = $productInfo["id"];
        if (empty($toEditProductID)) continue;
        $qty = $productInfo["qty"];
        $updateQuery = "
        UPDATE inventory_tb
        SET Unit = CASE
            WHEN $qty <= Unit THEN Unit - $qty
            WHEN $qty > Unit  THEN 0
            ELSE Unit
        END
        WHERE InventoryID = $toEditProductID;
        "; // AND Consumable = 1";
        $stmt = $conn->prepare($updateQuery);
        $updateInventoryResult = $stmt->execute();
        $stmt->close();

        if (!$updateInventoryResult) {
            // Handle inventory update error
            $_SESSION["alert_message"] = "Failed to update inventory. Please try again later.";
            $_SESSION["alert_message_error"] = true;
            header("Location: ../billing_slip/index.php");
            die();
        }
    }

    // Success
    $_SESSION["alert_message"] = "Successfully Added an Walk In Transaction.";
    $_SESSION["alert_message_success"] = true;
    $_SESSION['printSalesInsertedId'] = $salesInsertedId;
    //die(); // TODO : remove this line for debug
    // Redirect after processing
    header("Location: ../billing_slip/index.php");
    die();
}

// Close the database connection
$conn->close();
