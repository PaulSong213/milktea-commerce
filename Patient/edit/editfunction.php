<?php
require_once '../../php/connect.php';
$conn = connect();
session_start();

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $userDepartment = $userData['departmentName'];
}

if (isset($_POST['SaveItem'])) {
    $itemTypeID = $_POST['itemTypeID'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];
    $address = $_POST['add'];
    $phone_home = $_POST['phoneHome'];
    $phone_work = $_POST['phoneWork']; //8 phone_work
    $phone_cell = $_POST['phoneCell']; //9 cellNo
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];
    $employerName = $_POST['employerName'];
    $employeeDetail = $_POST['employerNo'];
    $workAddress = $_POST['workAddress'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $maritalStatus = $_POST['marital'];
    $spouseName = $_POST['SpouseName'];
    $spousecontactNo = $_POST['spousecontactNo'];
    $MotherName = $_POST['MotherName'];
    $mothercontactNo = $_POST['mothercontactNo'];
    $FatherName = $_POST['FatherName'];
    $fathercontactNo = $_POST['fathercontactNo'];
    $philHealth = $_POST['philHealth'];
    $phPin = $_POST['phPin'];
    $HMO = $_POST['HMO'];
    $typeHMO = $_POST['typeHMO'];
    $certNo = $_POST['certNo'];
    $emergencyname = $_POST['emergencyname'];
    $emergencyRelation = $_POST['emergencyRelation'];
    $emergencyAddress = $_POST['emergencyAddress'];
    $emergencyphoneHome = $_POST['emergencyphoneHome'];
    $emergencyphoneWork = $_POST['emergencyphoneWork'];
    $emergencyCphone = $_POST['emergencyCphone'];
    $allergies = $_POST['allergies'];
    $surgicalHistory = $_POST['surgicalHistory'];
    $activeDiagnosis = $_POST['activeDiagnosis'];
    $activeMeds = $_POST['activeMeds'];



    $sql = "UPDATE patient_tb
    SET
        lname = '$lname',
        fname = '$fname',
        mname = ' $mname',
        age = '$age',
        gender = '$gender',
        bDate = '$bdate',
        address = '$address',
        phone_home = '$phone_home',
        phone_work = '$phone_work',
        cellNo = '$phone_cell',
        email = '$email',
        occupation = '$occupation',
        employerName = '$employerName',
        employerDetail = '$employerDetail', 
        workAddress = '$workAddress',
        nationality = '$nationality', 
        religion = '$religion',
        maritalStatus = '$maritalStatus',
        spouseName = '$spouseName',
        spouseContact = '$spousecontactNo',
        motherName = '$MotherName',
        motherContact = '$mothercontactNo', 
        fatherContact = '$fathercontactNo',
        phMember = '$philHealth', 
        phNo = '$phPin', 
        HMO = '$HMO',  
        typeHMO = '$typeHMO',  
        CertNo = '$certNo', 
        emergencyName = '$emergencyname', 
        patientRelationship = '$emergencyRelation',  
        emergencyAddress = '$emergencyAddress',  
        emergencyHome = '$emergencyphoneHome', 
        emergencyWork = '$emergencyphoneWork',  
        emergencyCell = '$emergencyCphone', 
        patientAllergies = '$allergies',  
        patientsurgicalHistory = '$surgicalHistory',  
        patientActiveDiag = '$activeDiagnosis',  
        patientActiveMed = ' $activeMeds',  
        modifiedDate = now(),
        fatherName = ' $FatherName'
   
    WHERE
        hospistalrecordNo = '$itemTypeID';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // success
        $act = "Edit Patient Data";
        $description = "Edit Patient Data ";

        $conn1 = connect();
        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$userID', '$act', '$description', NOW())";
        $result1 = mysqli_query($conn1, $sql1);
        $_SESSION["alert_message"] = "Successfully Edited an Patient Information";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Edited an Patient Information. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
