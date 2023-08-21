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

require_once '../Supplier/index.php';
$connection = connect();

// get current status
$sql = "SELECT status FROM supplier_tb WHERE DatabaseID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$previousStatuE = $row["Status"];
$newStatus = $previousStatus == 0 ? 1 : 0; // swap 1 and 0


// Update new status
$sql = "UPDATE supplier_tb SET status=" . $newStatus . " WHERE DatabaseID=" . $_POST["rowID"] . ";";
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

header("Location: ../Supplier/view/index.php");
