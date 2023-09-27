<html>
<datalist id="employeeList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * from variant_tb;
    ";
    $result = $conn->query($query);
    $departmentData = (object)array(); // Create an empty object

    while ($row = $result->fetch_assoc()) {
        $departmentID = $row['variantID'];
        $departmentName = $row['variantName'];
        $fullName = $departmentName . ' | ID: ' . $departmentID;

        $department = (object)array(
            "id" => $departmentID,
            "data" => $row
        );
        $departmentData->$departmentID = $department; // Assign the employee object to the object property

        echo "<option value='$fullName'>$departmentName</option>";
    }
    $departmentData = json_encode($departmentData);

    $conn->close();
    ?>
</datalist>

</html>