<?php

require_once '../../php/connect.php';
$conn = connect();

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

if (!isset($input["password"])) {
    http_response_code(400);
    echo "password parameter is required";
    die();
}

$submittedPassword = $input["password"];

$query = "SELECT password, department_tb.departmentName, lname, fname, mname, position, title
FROM employee_tb
LEFT JOIN department_tb ON employee_tb.departmentID = department_tb.departmentID
WHERE department_tb.departmentName = 'ADMIN'";

$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $storedHashedPassword = $row["password"];
        if (password_verify($submittedPassword, $storedHashedPassword)) {
            http_response_code(200);
            echo json_encode($row);
            mysqli_close($conn);
            exit();
        }
    }

    http_response_code(404);
    echo "Admin Password does not exist";
} else {
    http_response_code(500);
    echo "Error executing the query: " . mysqli_error($conn);
}

mysqli_close($conn);
