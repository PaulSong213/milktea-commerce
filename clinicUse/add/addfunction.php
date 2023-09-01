<?php
session_start();
require_once '../../php/connect.php';
$conn = connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SaveItem'])) {
    $lname = $_POST['lname'];//1 lname
    $fname = $_POST['fname'];//2 fname
    $mname = $_POST['mname'];//3 mname
    $age = $_POST['age'];//4 age
    $gender = $_POST['gender']; //5 gender
    $bdate = $_POST['bdate'];//5 bDate
    $address = $_POST['add'];//6 address
    $phone_home = $_POST['phoneHome'];//7 phone_home
    $phone_work = $_POST['phoneWork'];//8 phone_work
    $phone_cell = $_POST['phoneCell'];//9 cellNo
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


    


    $sql = "INSERT INTO patient_tb (lname, fname, mname, age, gender, bDate, address, phone_home, phone_work, cellNo, email, occupation, employerName, employerDetail, workAddress, nationality, religion, maritalStatus, spouseName, spouseContact, motherName, motherContact, fatherContact, phMember, phNo, HMO, typeHMO, CertNo, emergencyName, patientRelationship, emergencyAddress, emergencyHome, emergencyWork, emergencyCell, patientAllergies, patientsurgicalHistory, patientActiveDiag, patientActiveMed, createDate, modifiedDate, fatherName)
    VALUES ('$lname','$fname','$mname','$age ','$gender',' $bdate','$address','$phone_home',' $phone_work','$phone_cell','$email','$occupation','$employerName','$employeeDetail','$workAddress','$nationality','$religion','$maritalStatus','$spouseName',' $spousecontactNo',' $MotherName','$mothercontactNo','$FatherName',' $philHealth','$phPin','$HMO','$typeHMO','$certNo','$emergencyname','$emergencyRelation','$emergencyAddress',' $emergencyphoneHome','$emergencyphoneWork','$emergencyCphone','$allergies','$surgicalHistory', '$activeDiagnosis', ' $activeMeds', NOW(),NOW(), '$fathercontactNo')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        //success
        $_SESSION["alert_message"] = "Successfully Added an Patient";
        $_SESSION["alert_message_success"] = true;
    } else {
        $_SESSION["alert_message"] = "Failed to Added an Patient. Error Details: " . mysqli_error($conn);
        $_SESSION["alert_message_error"] = true;
    }

    header("Location: ../index.php");
    die();
}

// Close the database connection
$conn->close();
