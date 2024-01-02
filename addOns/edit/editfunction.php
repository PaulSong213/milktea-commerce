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
    $itemCode = $_POST['item_code'];
    $itemTypeID = $_POST['itemTypeID'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $statusData = 1;

    // Define the target directory for image uploads
    // Define the target directory for image uploads
    $baseRoute = $_SERVER['DOCUMENT_ROOT'] . '/milktea-commerce/addons/';
    $targetDir = $baseRoute . 'add/image/'; // Make sure the path is correct, relative to this PHP file

    // Check if a file is selected
    if (!empty($_FILES['photo']['tmp_name'])) {
        // Allow certain image file formats (you can customize this list)
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $imageFileType = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

        if (in_array($imageFileType, $allowedExtensions)) {
            $photo = $targetDir . uniqid() . '_' . basename($_FILES['photo']['name']);

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo)) {
                // Image uploaded successfully
                // Use prepared statements to avoid SQL injection
                $photo = str_replace($baseRoute, '', $photo);
            } else {
                // Handle upload error
                $_SESSION["alert_message"] = "Failed to upload the image.";
                $_SESSION["alert_message_error"] = true;
                header("Location: ../index.php");
                die();
            }
        } else {
            // Handle invalid file type
            $_SESSION["alert_message"] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
            $_SESSION["alert_message_error"] = true;
            header("Location: ../index.php");
            die();
        }
    } else {
        // No file selected - set $photo to NULL to avoid changing the image field
        $photo = NULL;
    }

    // Modify the SQL update query based on whether an image is uploaded or not
    if (!empty($_FILES['photo']['tmp_name'])) {
        $stmt = $conn->prepare("UPDATE addons_tb 
                                SET addImage = ?, addName = ?, itemTypeID = ?, price = ?, description = ?, status = ?, modifiedDate = NOW()
                                WHERE addID = ?");
        $stmt->bind_param("sssssdi", $photo, $itemCode, $itemTypeID, $price, $description, $statusData, $item_id);
    } else {
        $stmt = $conn->prepare("UPDATE addons_tb 
                                SET addName = ?, itemTypeID = ?, price = ?, description = ?, status = ?, modifiedDate = NOW()
                                WHERE addID = ?");
        $stmt->bind_param("ssssdi", $itemCode, $itemTypeID, $price, $description, $statusData, $item_id);
    }

    $item_id = $_POST['item_id'];

    if ($stmt->execute()) {
        $act = "Edit Inventory Item";
        $description = "Edit Inventory Data: [$itemCode]";
        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp) VALUES (?, ?, ?, NOW())";
        $stmt1 = $conn1->prepare($sql1);
        $stmt1->bind_param("iss", $userID, $act, $description);
        $stmt1->execute();

        $_SESSION["alert_message"] = "Successfully Edited an Item";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edit an Item. Error Details: " . $stmt->error;
        $_SESSION["alert_message_error"] = true;
    }

    $stmt->close();
    $stmt1->close();

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
