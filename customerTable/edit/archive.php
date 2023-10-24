<?php
session_start();
// Allow post requests only
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "POST REQUEST ONLY";
    die();
};

// Data Validation
if (!isset($_POST["rowID"])) {
    echo "ID is required";
    die();
};

require_once '../../php/connect.php';
$connection = connect();

// get current status
$sql = "SELECT status FROM inventory_tb WHERE InventoryID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);

if (!$result) {

    $_SESSION["alert_message"] = "Failed to " . $action . " Item. Error Details: " . mysqli_error($connection);
    $_SESSION["alert_message_error"] = true;
    header("Location: ../index.php");
    die();
}

$row = $result->fetch_assoc();
$previousStatus = $row["status"];
$newStatus = $previousStatus == 0 ? 1 : 0; // swap 1 and 0

// Update new status
$sql = "UPDATE inventory_tb SET status=" . $newStatus . " WHERE InventoryID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);

if ($result) {
    // set session variable
    $newStatus == 0 ? $action = "Archived" : $action = "Unarchived";

    $act = "$action Inventory Item";
    $description = " $action Add Employee Data";
    $conn1 = connect();
    $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
    $result1 = mysqli_query($conn1, $sql1);
    $_SESSION["alert_message"] = "Successfully " . $action . " Item";
    $_SESSION["alert_message_success"] = true;
} else {
    $_SESSION["alert_message"] = "Failed to " . $action . " Item. Error Details: " . mysqli_error($connection) . "";
    $_SESSION["alert_message_error"] = true;
}

header("Location: ../index.php");
