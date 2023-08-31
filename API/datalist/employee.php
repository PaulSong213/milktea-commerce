<html>
<datalist id="employeeList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT title, fname, lname, mname, DatabaseID, department_tb.departmentName
    FROM employee_tb
    LEFT JOIN department_tb ON employee_tb.departmentID = department_tb.departmentID;
    ";
    $result = $conn->query($query);
    $employeesData = (object)array(); // Create an empty object

    while ($row = $result->fetch_assoc()) {
        $DatabaseID = $row['DatabaseID'];
        $title = $row['title'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];
        $departmentName = $row['departmentName'];
        $fullName = $title . ' ' . $lname . ',' . $fname . ' ' . $mname . ' | ID: ' . $DatabaseID;

        $employee = (object)array(
            "id" => $DatabaseID,
            "data" => $row
        );
        $employeesData->$DatabaseID = $employee; // Assign the employee object to the object property

        echo "<option value='$fullName'>$departmentName</option>";
    }
    $employeesData = json_encode($employeesData);

    $conn->close();
    ?>
</datalist>

</html>