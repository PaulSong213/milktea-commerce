<?php

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userID = $userData['DatabaseID'];
    $lname = $userData['lname'];
    $fname = $userData['fname'];
    $mname = $userData['mname'];
    $nname = $userData['nickName'];
} else {
    // Redirect back to the login page or handle the user not being logged in
    header("Location: ./index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggested Input Text</title>
</head>

<body>
    <form method="POST" action="./add/addfunction.php" autocomplete="on" id="addItemForm">
        <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Expenses</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <div class="mb-3">
                            <label class="form-label" for="expenseType">Expense Type<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="expenseType" name="expenseType" required>
                                <option value="Common">Common</option>
                                <option value="Uncommon">Uncommon</option>
                                <option value="New">New</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="department">Department<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="department" name="department" required>
                                <?php
                                require_once '../php/connect.php';
                                $connectionType = connect();
                                $sqlDepartment = "select * from department_tb";
                                $resultDepartment = $connectionType->query($sqlDepartment);
                                if (!$resultDepartment) die($connectionType->error);
                                while ($rowType = $resultDepartment->fetch_assoc()) {
                                    echo '<option value="' . $rowType["departmentID"] . '">' . $rowType["departmentName"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amount">Amount<span class="text-danger mx-1">*</span></label>
                            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Amount" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="payable">Payable To<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="payable" name="payable" class="form-control" placeholder="Enter Payment Method" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="docRef">Doc Ref<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="docRef" name="docRef" class="form-control" placeholder="Enter Doc Ref" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="reason">Reason<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="reason" name="reason" class="form-control" placeholder="Enter Reason" autocomplete="on" required>
                        </div>
                        <div class="form-group">
                            <label for="enteredByName">Entered By: </label>
                            <input type="text" class="form-control is-valid text-dark" name="enteredByName" list="employeeList" readonly correctData="employeesData" placeholder="Enter Entered By Name" value="<?= $lname. ', ' . $fname . ' ' .$mname?>"  required isvalidated="true">
                            
                            <small class="feedback d-none bg-danger p-1 rounded my-1">
                                Please select a valid requested by Name.
                            </small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="requestedBy">Requested By<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="requestedBy" name="requestedBy" required>
                                <?php
                                require_once '../php/connect.php';
                                $connectionType = connect();
                                $sqlDepartment = "SELECT * FROM employee_tb";
                                $resultDepartment = $connectionType->query($sqlDepartment);
                                if (!$resultDepartment) {
                                    die($connectionType->error);
                                }
                                while ($rowType = $resultDepartment->fetch_assoc()) {
                                    $fullName = $rowType["fname"] . ' ' . $rowType["mname"] . ' ' . $rowType["lname"];
                                    $position = $rowType["position"]; // Assuming position is a column in your employee table
                                    echo '<option value="' . $fullName . ',' . $position . '">' . $fullName . ', ' . $position . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Note">Note</label>
                            <textarea class="form-control" id="Note" name="Note" placeholder="Enter description" autocomplete="on"></textarea>
                        </div>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="SaveItem">Save Expenses</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>