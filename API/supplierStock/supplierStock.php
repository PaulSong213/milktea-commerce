<html>
<datalist id="employeeList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * from supplier_tb;
    ";
    $result = $conn->query($query);
    $supplier_id = (object)array(); // Create an empty object

    while ($row = $result->fetch_assoc()) {
        $supplier_id = $row['supplier_id'];
        $supplier_code = $row['supplier_code'];
        $supplierInfo = $supplier_code . ' | ID: ' . $supplier_id;

        $supplier = (object)array(
            "id" => $supplier_id,
            "data" => $row
        );
        $supplierData->$supplierID = $supplier; // Assign the employee object to the object property

        echo "<option value='$supplierInfo'>$supplier_code</option>";
    }
    $departmentData = json_encode($supplierData);

    $conn->close();
    ?>
</datalist>

</html>