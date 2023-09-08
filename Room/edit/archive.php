<?php
session_start();
// Allow post requests only
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "POST REQUEST ONLY";
    die();
};
if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $userDepartment = $userData['departmentName'];
}

// Data Validation
if (!isset($_POST["rowID"])) {
    echo "ID is required";
    die();
};

require_once '../../php/connect.php';
$connection = connect();

// get current status
$sql = "SELECT status FROM room_tb WHERE room_ID=" . $_POST["rowID"] . ";";
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
$sql = "UPDATE room_tb SET status=" . $newStatus . " WHERE room_ID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);

if ($result) {
    // set session variable
    $newStatus == 1 ? $action = "Available" : $action = "Occupied/Under Maintenance";

   
    $_SESSION["alert_message"] = "Successfully " . $action . " Item";
    $act = "Room is  $action";
    $description = "Room is  $action";

    $conn1 = connect();
    $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
    $result1 = mysqli_query($conn1, $sql1);
    $_SESSION["alert_message_success"] = true;
} else {
    $_SESSION["alert_message"] = "Failed to " . $action . " Item. Error Details: " . mysqli_error($connection) . "";
    $_SESSION["alert_message_error"] = true;
}

header("Location: ../index.php");
