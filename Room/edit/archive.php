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
$sql = "SELECT status FROM room_tb WHERE room_ID= ". $_POST["rowID"] . ";";
$result = $connection->query($sql);

if (!$result) {
    $_SESSION["alert_message"] = "Failed to " . $action . " Item. Error Details: " . mysqli_error($connection);
    $_SESSION["alert_message_error"] = true;
    header("Location: ../index.php");
    die();
}

$row = $result->fetch_assoc();
$previousStatus = $row["status"];
$newStatus = $previousStatus == 'Not Available' ? 'Available' : 0; // swap 1 and 0

// Update new status
$sql = "UPDATE room_tb SET status=" . $newStatus . " WHERE room_ID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);

if ($result) {
    // set session variable
    $newStatus == 'Available' ? $action = "Archived" : $action = "Unarchived";
    $_SESSION["alert_message"] = "Successfully " . $action . " Item";
    $_SESSION["alert_message_success"] = true;
} else {
    $_SESSION["alert_message"] = "Failed to " . $action . " Item. Error Details: " . mysqli_error($connection) . "";
    $_SESSION["alert_message_error"] = true;
}

header("Location: ../index.php");
