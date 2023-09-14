<html>
<datalist id="patientList">
    <?php
    require_once '../php/connect.php';
    $conn = connect();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT fname , lname , mname , hospistalrecordNo,age,bDate,gender,maritalStatus, address FROM patient_tb";
    $patients = $conn->query($query);
    $patientsData = (object)array(); // Create an empty object
    while ($row = $patients->fetch_assoc()) {
        $hospistalrecordNo = $row['hospistalrecordNo'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];
        $fullName = $lname;

        // Create an object for the current patient
        $patient = (object)array(
            "id" => $hospistalrecordNo,
            "data" => $row
        );

        $patientsData->$hospistalrecordNo = $patient; // Assign the patient object to the object property

        echo "<option value='$fullName'></option>";
    }
    $patientsData = json_encode($patientsData);

    ?>
</datalist>


<?php $conn->close(); ?>

</html>
