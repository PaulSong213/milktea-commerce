<?php
require_once '../../php/connect.php';
$conn = connect();

if (isset($_POST['SaveItem'])) {
    $EmployeeCode = $_POST['employee_code'];
    $lname = $_POST['employee_lname'];
    $fname = $_POST['employee_fname'];
    $mname = $_POST['employee_maname'];
    $nickname = $_POST['employee_nickname'];
    $bdate = $_POST['employee_bdate'];
    $marital = $_POST['marital'];
    $sex = $_POST['sex'];
    $item_id = $_POST['depart'];
    $title = $_POST['title'];
    $position = $_POST['position'];
    $employeesdate = $_POST['employee_sdate'];
    $email = $_POST['email'];
    $password= $_POST['Password'];
    $statusData = 1;

    $sql = "UPDATE employee_tb
    SET
        employee_code = 'employee_code',
        lname = '$lname',
        fname = '$fname',
        Generic = '$generic',
        SugPrice = '$sugPrice',
        MWprice = '$mwPrice',
        IPDprice = '$ipdPrice',
        Ppriceuse = '$ppriceUse',
        Status = '$statusData',
        itemCode = '$itemCode',
        modifiedDate = now()
    WHERE
        InventoryID = '$item_id';
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../index.php");
        die();
    } else {
        header("Location: ../index.php");
        die();
    }
}

// Close the database connection
$conn->close();
