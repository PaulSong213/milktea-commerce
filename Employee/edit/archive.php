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
$sql = "SELECT Status FROM employee_tb WHERE DatabaseID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);
if (!$result) {
    echo "Error: " . $sql . "<br>" . $connection->error;
    die();
}
$row = $result->fetch_assoc();
$previousStatus = $row["Status"];
$newStatus = $previousStatus == 0 ? 1 : 0; // swap 1 and 0


// Update new status
$sql = "UPDATE employee_tb SET Status=" . $newStatus . " WHERE DatabaseID=" . $_POST["rowID"] . ";";
$result = $connection->query($sql);

if (mysqli_affected_rows($connection) > 0) {
    // set session variable
    $newStatus == 0 ? $action = "Archived" : $action = "Unarchived";

    $act = "$action Employee Data";
    $description = "$action Employee Data ";

    $conn1 = connect();
    $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
    $result1 = mysqli_query($conn1, $sql1);

    $_SESSION["alert_message"] = "Successfully " . $action . " Item";
    $_SESSION["alert_message_success"] = true;
} else {
    $_SESSION["alert_message"] = "Failed to " . $action . " Item";
    $_SESSION["alert_message_error"] = false;
}

header("Location: ../index.php");
