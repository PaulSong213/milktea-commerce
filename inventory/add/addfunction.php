<?php
session_start();
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $userDepartment = $userData['departmentName'];
}

if (isset($_POST['SaveItem'])) {
    $basePrice = 0;
    if (isset($_POST['basePrice']) && !empty($_POST['basePrice'])) {
        $basePrice = $_POST['basePrice'];
    }
    $itemTypeID = $_POST["itemTypeID"];
    $itemCode = $_POST["item_code"];
    $variantID = 100;
    $description = $_POST["description"];
    $status = 1; // Added missing semicolon

    // Define the target directory for image uploads
    $targetDir = 'image/';

    // Generate a unique filename for the uploaded image
    $photo = $targetDir . uniqid() . '_' . basename($_FILES['photo']['name']);

    // Check if a file is selected
    if (!empty($_FILES['photo']['tmp_name'])) {
        // Allow certain image file formats (you can customize this list)
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $imageFileType = strtolower(pathinfo($photo, PATHINFO_EXTENSION));

        if (in_array($imageFileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) {
                // Image uploaded successfully
                // Use prepared statements to avoid SQL injection
                $stmt = $conn->prepare("INSERT INTO inventory_tb (basePrice,itemTypeID, itemCode, Description, variantID, createDate, modifiedDate, image, Status) 
                                                          VALUES (?,?, ?, ?, ?, NOW(), NOW(), ?, ?)");
                $photo = 'add/' . $photo;
                $stmt->bind_param("sssssss", $basePrice, $itemTypeID, $itemCode, $description, $variantID, $photo, $status);

                if ($stmt->execute()) {
                    $act = "Add New Inventory Item";
                    $description = "Add Inventory Data: [$itemCode]";
                    $conn1 = connect();
                    $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp) VALUES (?, ?, ?, NOW())";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("iss", $userID, $act, $description);
                    $stmt1->execute();

                    $_SESSION["alert_message"] = "Successfully Added an Item";
                    $_SESSION["alert_message_success"] = true;
                } else {
                    $_SESSION["alert_message"] = "Failed to Add an Item. Error Details: " . $stmt->error;
                    $_SESSION["alert_message_error"] = true;
                }

                $stmt->close();
                $stmt1->close();
            } else {
                // Handle upload error
                $_SESSION["alert_message"] = "Failed to upload the image. $targetDir";
                $_SESSION["alert_message_error"] = true;
            }
        } else {
            // Handle invalid file type
            $_SESSION["alert_message"] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
            $_SESSION["alert_message_error"] = true;
        }
    } else {
        // No file selected
        $_SESSION["alert_message"] = "Please select an image to upload.";
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
