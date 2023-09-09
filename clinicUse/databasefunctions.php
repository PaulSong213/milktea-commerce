<?php
session_start();
require_once '../php/connect.php';
$conn = connect();

// Function to handle database connection and return the connection object
function connectDatabase()
{
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

if (isset($_POST['SaveItem'])) {
    $conn = connectDatabase(); // Use the connectDatabase function

    // Retrieve input data
    $chargeSlipNumber = $_POST['chargeSlipNumber'];
    $requestedByName = $_POST['requestedByName'];
    $enteredByName = $_POST['enteredByName'];
    $netAmount = $_POST['netAmount'];
    $department = $_POST['department'];

    // Prepare product information array
    $productInfoArray = [];
    $unit = $_POST['unit'];
    $subtotal = $_POST['subtotal'];
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $ItemType = $_POST['itemType'];
    $ItemTypeID = $_POST['itemTypeID'];
    // $product_desciption = $_POST['product_desciption'];


    for ($i = 0; $i < count($product_id); $i++) {
        if (!empty($product_id[$i])) { // Use !empty() to check for non-empty values
            $qtyValue = max(1, intval($qty[$i])); // Ensure qty is at least 1 and cast to int

            $productInfoArray[] = [
                "subtotal" => $subtotal[$i],
                "product_id" => $product_id[$i],
                "qty" => $qtyValue,
                "price" => $price[$i],
                "id" => $id[$i],
                "unit" => $unit[$i],
                "itemType" => $ItemType[$i],
                "itemTypeID" => $ItemTypeID[$i],
                // "product_desciption" => $product_desciption[$i]
            ];
        }
    }
    

    // Encode product information as JSON
    $productInfoJSON = json_encode($productInfoArray);

    // Check if SalesID is set
    $SalesID = isset($_POST['SalesID']) ? $_POST['SalesID'] : null;

    // Prepare and execute the SQL query
    $insertQuery = "INSERT INTO clinicuse_tb (SalesID, ProductInfo, department, NetAmt, requestedBy, enteredBy, createDate)
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($insertQuery);
    if ($stmt) {
        $stmt->bind_param("ssssss", $SalesID, $productInfoJSON, $department, $netAmount, $requestedByName, $enteredByName);
        $result = $stmt->execute();

        if ($result) {
            // Update inventory and handle errors
            // Get the data of the last inserted row
            $salesInsertedId = mysqli_insert_id($conn);

            // Minus the quantity of the products in the inventory
            // Update inventory quantities
            for ($i = 0; $i < sizeof($productInfoArray); $i++) {
                $productInfo = $productInfoArray[$i];
                $toEditProductID = $productInfo["product_id"];
                if (empty($toEditProductID)) continue;
                $qty = $productInfo["qty"];
                $updateQuery = "UPDATE inventory_tb SET Unit = Unit - ? WHERE InventoryID = ? "; // AND Consumable = 1";
                $stmt = $conn->prepare($updateQuery);
                $stmt->bind_param("ii", $qty, $toEditProductID);
                $updateInventoryResult = $stmt->execute();
                $stmt->close();

                if (!$updateInventoryResult) {
                    // Handle inventory update error
                    $_SESSION["alert_message"] = "Failed to update inventory. Please try again later.";
                    $_SESSION["alert_message_error"] = true;
                    header("Location: ../clinicUse/index.php");
                    die();
                }
            }
   // Success
   $_SESSION["alert_message"] = "Successfully Added an Billing Statement.";
   $_SESSION["alert_message_success"] = true;
   $_SESSION['printSalesInsertedId'] = $salesInsertedId;
   //die(); // TODO : remove this line for debug
   // Redirect after processing
   header("Location: ../clinicUse/index.php");
   die();
}
        $stmt->close();
        
        if (isset($_SESSION['printSalesInsertedId'])) {
            $printSalesInsertedId = $_SESSION['printSalesInsertedId'];
            echo "<script>showChargeSlip('$printSalesInsertedId');</script>";
            unset($_SESSION['printSalesInsertedId']);
        }

    } else {
        // Set error message for SQL query preparation
        $_SESSION["alert_message"] = "Failed to prepare the statement. Error Details: " . $conn->error;
        $_SESSION["alert_message_error"] = true;
        header("Location: ../clinicUse/index.php");
        die();
    }
}

// Close the database connection
$conn->close();
?>