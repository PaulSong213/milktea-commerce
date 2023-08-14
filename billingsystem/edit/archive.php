<?php
session_start();
// Allow post requests only
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "POST REQUEST ONLY";
    die();
};

// Data Validation
if (!isset($_POST["InventoryID"])) {
    echo "InventoryID is required";
    die();
};

require_once '../../php/connect.php';
$connection = connect();

// get current status
$sql = "SELECT status FROM inventory_tb WHERE InventoryID=" . $_POST["InventoryID"] . ";";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$previousStatus = $row["status"];
$newStatus = $previousStatus == 0 ? 1 : 0; // swap 1 and 0


// Update new status
$sql = "UPDATE inventory_tb SET status=" . $newStatus . " WHERE InventoryID=" . $_POST["InventoryID"] . ";";
$result = $connection->query($sql);

if (mysqli_affected_rows($connection) > 0) {
    // set session variable
    $newStatus == 0 ? $action = "Archived" : $action = "Unarchived";
    $_SESSION["alert_message"] = "Successfully " . $action . " Item";
    $_SESSION["alert_message_success"] = true;
} else {
    $_SESSION["alert_message"] = "Failed to " . $action . " Item";
    $_SESSION["alert_message_error"] = false;
}

header("Location: ../index.php");
