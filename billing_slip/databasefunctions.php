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
    $UnpaidPatientName = "";
    $requestedByName = $_POST['requestedByName'];
    $enteredByName = $_POST['enteredByName'];
    $netSale = $_POST['netSale'];
    $additionalDiscount = $_POST['additionalDiscount'];
    $netAmount = $_POST['netAmount'];
    $amountTendered = $_POST['amountTendered'];
    $change = $_POST['change'];

    $patientType = $_POST['patientAccountType'];

    $billingID = null;
    $paymentType = "cash";
    if (isset($_POST['billingID']) && !empty($_POST['billingID']) && $patientType == "IPD") {
        $paymentType = "bill";
        // There is existing billing ID
        $billingID = $_POST['billingID'];
    } else if ($change < 0) {
        $paymentType = "bill";
        // OPT with remaining balance
        // Create new billing
        $encoderID = $enteredByName;
        $patientID = $patientAccountName;
        $type = $patientType;
        $formattedDatetimeAdmitted = null;
        $formattedDatetimeDischarged = null;
        if ($type == "IPD") {
            $accountOfID = $_POST['accountOfID'];
            $dateAdmitted = $_POST['dateAdmitted'];
            $timeAdmitted = $_POST['timeAdmitted'];
            $attendingPhysicianID = $_POST['attendingPhysicianID'];
            $admittingPhysicianID = $_POST['admittingPhysicianID'];
            $dateDischarged = $_POST['dateDischarged'];
            $timeDischarged = $_POST['timeDischarged'];
            if (!empty($dateDischarged) && !empty($timeDischarged)) {
                $datetimeAdmitted = new DateTime($dateAdmitted . ' ' . $timeAdmitted);
                $formattedDatetimeAdmitted = $datetimeAdmitted->format('Y-m-d H:i:s');
            }
            if (!empty($dateDischarged) && !empty($timeDischarged)) {
                $datetimeDischarged = new DateTime($dateDischarged . ' ' . $timeDischarged);
                $formattedDatetimeDischarged = $datetimeDischarged->format('Y-m-d H:i:s');
            }
        } else {
            // create billing for IPD with remaining balance
            $accountOfID = $patientID;
            // set formattedDatetimeAdmitted to current datetime
            $datetimeAdmitted = new DateTime();
            $formattedDatetimeAdmitted = $datetimeAdmitted->format('Y-m-d H:i:s');
            // set formattedDatetimeDischarged to current datetime
            $datetimeDischarged = new DateTime();
            $formattedDatetimeDischarged = $datetimeDischarged->format('Y-m-d H:i:s');
            $attendingPhysicianID = $requestedByName;
            $admittingPhysicianID = $requestedByName;
        }



        $queryCreateBilling = "INSERT INTO `billing_tb` 
                (`encoderID`, `patientID`, `accountOfID`, `dateTimeAdmitted`, `type`, `attendingPhysicianID`, `admittingPhysicianID`, `dateTimeDischarged`) 
                VALUES ('$encoderID', '$patientID', '$accountOfID', '$formattedDatetimeAdmitted', '$type', '$attendingPhysicianID', '$admittingPhysicianID', '$formattedDatetimeDischarged');";

        $resultCreateBilling = mysqli_query($conn, $queryCreateBilling);
        $billingID = mysqli_insert_id($conn);
        if (!$resultCreateBilling) {
            $_SESSION["alert_message"] = "Failed to Add a Billing Statement. Error Details: " . mysqli_error($conn);
            $_SESSION["alert_message_error"] = true;
            header("Location: ../billing_slip/index.php");
            die();
        }
    }

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
            "disc_percent" => $disc_percent[$i],
            "disc_amt" => $disc_amt[$i],
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

    // check if billing is null
    $intBillingID = $billingID != null ? "'$billingID'" : "NULL";

    // check if there is existing patient record
    if ($patientType == "OPD" && !is_int($patientAccountName)) {
        $UnpaidPatientName = $patientAccountName;
    }

    // Prepare the INSERT query
    $insertQuery = "INSERT INTO sales_tb (ProductInfo, NetSale, AddDisc, AddDiscAmt, NetAmt, AmtTendered, ChangeAmt, PatientAcct, RequestedName, EnteredName, PatientType, createDate, billingID, UnpaidPatientName)
                    VALUES ('$productInfoJSON', '$netSale', '$additionalDiscount', '$addDiscAmt', '$netAmount', '$amountTendered', '$change', '$patientAccountName', '$requestedByName', '$enteredByName', '$patientType', NOW(), $intBillingID, '$UnpaidPatientName')";

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
        $_SESSION["alert_message"] = "Failed to Add a Billing Statement. Error Details: " . mysqli_error($conn);
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

    if ($amountTendered > 0) {
        $paymentChange = $change;
        if ($paymentChange < 0) $paymentChange = 0;
        // insert payment transaction history
        $insertPaymentQuery = "INSERT INTO `payment_tb` 
        (`billID`, `chargeID`, `receivedID`, `dateTimePaid`, `modifiedDate`, `paymentType`, `type`, `cashAmountTendered`, `changeAmt`) 
        VALUES ('$billingID', '$chargeSlipNumber', '$enteredByName', current_timestamp(), current_timestamp(), 'cash', '$paymentType', '$amountTendered', '$paymentChange');";
        $result = mysqli_query($conn, $insertPaymentQuery);

        // save insert id to print
        $insertedPaymentID = $conn->insert_id;
        $_SESSION["printPaymentInsertedId"] = $insertedPaymentID;
    }


    // Success
    $_SESSION["alert_message"] = "Successfully Added an Billing Statement.";
    $_SESSION["alert_message_success"] = true;
    $_SESSION['printSalesInsertedId'] = $salesInsertedId;
    //die(); // TODO : remove this line for debug
    // Redirect after processing
    header("Location: ../billing_slip/index.php");
    die();
}

// Close the database connection
$conn->close();
