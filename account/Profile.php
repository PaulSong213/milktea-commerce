<?php

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userName = $userData['userName'];
    $userDept = $userData['departmentID'];
    $lname = $userData['lname'];
    $fname = $userData['fname'];
    $mname = $userData['mname'];
    $nname = $userData['nickName'];
    $title = $userData['title'];
    $position = $userData['position'];
    $marital = $userData['maritalStatus'];
    $gender = $userData['sex'];
    $bdate = $userData['bDate'];
    $departmentName = $userData['departmentName'];
    $dateStarted = $userData['dateStart'];
    $status = $userData['Status'];
    $createdDate = $userData['createDate'];
    $modifiedDate = $userData['modifiedDate'];
} else {
    // Redirect back to the login page or handle the user not being logged in
    header("Location: /Zarate/index.php");
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location: ./index.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style type="text/css">
        body {

            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        #account {
            font-size: 120px;
            /* Adjust the font-size to change the icon size */
        }

        #myInput {
            border: none;
            /* This removes the border */
        }

        .main-body {
            padding-top: 30px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;

        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .animated-icon {
            animation: rotate 3s ;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card" style="border-style: double;">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <i class="material-icons animated-icon" id="account">account_circle</i>
                                <div class="mt-3">
                                    <h4><?php echo $title . ' ' . $fname . ' ' . $lname ?></h4>
                                    <p class="text-secondary mb-1">
                                    <h4><?php echo $departmentName ?></h4>
                                    </p>
                                    <p class="text-muted font-size-sm"><?php echo $position ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">User Name :
                                    <span class="text-secondary"><?php echo $userName ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Created Date :
                                    <span class="text-secondary"> <?php echo $createdDate ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Modified Date :
                                    <span class="text-secondary"> <?php echo $modifiedDate ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <?php echo $lname . ' ' . $fname .  ', ' . $mname  ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nickname</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <?php echo $nname ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <?php echo $title ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Position</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <?php echo $position ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Marital Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo $marital;
                                    ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo $gender
                                    ?>
                                </div>
                            </div>
                            <hr>



                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Birth Date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $bdate ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Department</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo $departmentName
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date Started</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $dateStarted ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    $status = 1; // Replace this with the actual value of $userData['Status']

                                    if ($status == 1) {
                                        $result = "Active";
                                    } else {
                                        $result = "Inactive";
                                    }

                                    echo $result;
                                    ?>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>