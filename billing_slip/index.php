<?php
session_start();

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userName = $userData['DatabaseID'];
} else {
    // Redirect back to the login page or handle the user not being logged in
    header("Location: ./login.php");
    exit();
}



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Billing</title>
</head>

<body>

    <!-- main content -->
    <div class="d-flex flex-direction-row">
        <div class="d-block">
            <?php include('../sidebar.php') ?>
        </div>
        <div class="d-block w-100">
            <?php include('./charge.php') ?>
            <?php include('../php/session-dialog.php') ?>
            <?php include('./templates/charge-slip.php') ?>
            <?php require_once('./templates/payment-slip.php'); ?>
            <?php require_once('./templates/service-form.php'); ?>
        </div>
    </div>

    <!-- end of main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>