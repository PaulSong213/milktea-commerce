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
    $password = $userData['password'];
    $dateStarted = $userData['dateStart'];
    $status = $userData['Status'];
    $createdDate = $userData['createDate'];
    $modifiedDate = $userData['modifiedDate'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Edit Profile
        </button>
    </div>

    <form method="POST" id="addItemForm" action="editFunction.php">

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a large modal -->
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Update Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                <div class="modal-body" style="max-width: 100%;" >
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="mb-3 text-left">
                                <label class="form-label" for="employee_lname" style="text-align: left;">Last Name<span class="text-danger mx-1">*</span></label>
                                <input type="text" id="employee_lname" name="employee_lname" class="form-control" autocomplete="on" required value = <?php echo $lname ?>>
                            </div>
                            <div class="mb-4 text-left">
                                <label class="form-label" for="employee_fname">First Name<span class="text-danger mx-1">*</span></label>
                                <input type="text" id="employee_fname" name="employee_fname" class="form-control" value=<?php echo $fname ?> autocomplete="on" required>
                            </div>
                            <div class="mb-3 text-left">
                                <label class="form-label" for="employee_mname">Middle Name<span class="text-danger mx-1">*</span></label>
                                <input type="text" id="employee_mname" name="employee_mname" class="form-control" value=<?php echo $mname ?> autocomplete="on" required>
                            </div>
                            <div class="mb-3 text-left">
                                <label class="form-label" for="employee_nname">Nick Name<span class="text-danger mx-1">*</span></label>
                                <input type="text" id="employee_nname" name="employee_nname" class="form-control" autocomplete="on" required value=<?php echo $mname ?>>
                            </div>
                            <div class="mb-3 text-left">
                                <label class="form-label" for="employee_bdate">Birth Date<span class="text-danger mx-1">*</span></label>
                                <input type="date" id="employee_bdate" name="employee_bdate" class="form-control" value=<?php echo $bdate ?> autocomplete="on" required>
                            </div>

                            <div class="mb-3 text-left">
                                <label class="form-label" for="marital">Marital Status<span class="text-danger mx-1">*</span></label>
                                <select class="form-select" id="marital" name="marital" required>
                                    <option value="Single" <?php if ($marital === 'Single') echo 'selected'; ?>>Single</option>
                                    <option value="Married" <?php if ($marital === 'Married') echo 'selected'; ?>>Married</option>
                                    <option value="Widowed" <?php if ($marital === 'Widowed') echo 'selected'; ?>>Widowed</option>
                                    <option value="Separated" <?php if ($marital === 'Separated') echo 'selected'; ?>>Separated</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3 text-left">
                                    <label class="form-label" for="sex">Sex<span class="text-danger mx-1">*</span></label>
                                    <select class="form-select" id="sex" name="sex" required>
                                        <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
                                        <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
                                    </select>
                                </div>
                                <div class="mb-3 text-left">
                                    <label class="form-label" for="title">Title<span class="text-danger mx-1">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control" value=<?php echo $title ?> placeholder="Enter Title" required autocomplete="on" />
                                </div>

                                <div class="mb-3 text-left">
                                    <label class="form-label" for="position">Position<span class="text-danger mx-1">*</span></label>
                                    <input type="text" id="position" name="position" class="form-control" value=<?php echo $position ?> placeholder="Enter Position" required autocomplete="on">
                                </div>

                                <div class="mb-3 text-left">
                                    <label class="form-label" for="employee_sdate">Date Started<span class="text-danger mx-1">*</span></label>
                                    <input type="date" id="employee_sdate" name="employee_sdate" value=<?php echo $dateStarted ?> class="form-control" placeholder="Enter employee middle name">
                                </div>

                                <div class="mb-3 text-left">
                                    <label class="form-label" for="email">Email<span class="text-danger mx-1">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" value=<?php echo $userName ?> placeholder="Enter employee email" required autocomplete="on">
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="saveItemButton" name="SaveItem">Update</button>
                    </div>

                </div>
            </div>
        </div>

    </form>
</body>

</html>