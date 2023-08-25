<!DOCTYPE html>

<html lang="en">

<form method="POST" onsubmit="return validatePassword();" id="addItemForm" action="addfunction.php">

    <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add New Employee</h5>
                    <button type="button" class="close" id="Closemodal1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content goes here -->

                    <!--Last Name -->
                    <div class="mb-3">
                        <label class="form-label" for="employee_lname">Last Name<span class="text-danger mx-1">*</span></label>
                        <input type="text" id="employee_lname" name="employee_lname" class="form-control" placeholder="Enter employee last name" autocomplete="on" required>
                    </div>

                    <!--First Name -->
                    <div class="mb-3">
                        <label class="form-label" for="employee_fname">First Name<span class="text-danger mx-1">*</span></label>
                        <input type="text" id="employee_fname" name="employee_fname" class="form-control" placeholder="Enter employee first name" autocomplete="on" required>
                    </div>

                    <!--Middle Name -->
                    <div class="mb-3">
                        <label class="form-label" for="employee_mname">Middle Name<span class="text-danger mx-1">*</span></label>
                        <input type="text" id="employee_mname" name="employee_mname" class="form-control" placeholder="Enter employee middle name" autocomplete="on" required>
                    </div>

                    <!--Nickname -->
                    <div class="mb-3">
                        <label class="form-label" for="employee_nickname">Nickname<span class="text-danger mx-1">*</span></label>
                        <input type="text" id="employee_nickname" name="employee_nickname" class="form-control" placeholder="Enter employee Nickname" autocomplete="on" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employee_bdate">Birth Date<span class="text-danger mx-1">*</span></label>
                        <input type="date" id="employee_bdate" name="employee_bdate" class="form-control" placeholder="Enter employee middle name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="marital">Marital Status<span class="text-danger mx-1">*</span></label>
                        <select class="form-select" id="marital" name="marital" required>
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
                        <label class="form-label" for="marital">Sex<span class="text-danger mx-1">*</span></label>
                        <select class="form-select" id="type" name="sex" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="dept">Department<span class="text-danger mx-1">*</span></label>
                        <select class="form-select" id="dept" name="dept" required>
                            <option value="IT Department">IT Department</option>
                            <option value="Admin Department">Admin Department</option>
                            <option value="Information Department">Information Department</option>
                            <option value="HMO Department">HMO Department</option>
                            <option value="OR Department">OR Department</option>
                            <option value="IP Department">IP Department</option>
                            <option value="Accounting Department">Accounting Department</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="title">Title<span class="text-danger mx-1">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" required autocomplete="on" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="position">Position<span class="text-danger mx-1">*</span></label>
                        <input type="text" id="position" name="position" class="form-control" placeholder="Enter Position" required autocomplete="on">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="employee_sdate">Date Started<span class="text-danger mx-1">*</span></label>
                        <input type="date" id="employee_sdate" name="employee_sdate" class="form-control" placeholder="Enter employee middle name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email<span class="text-danger mx-1">*</span></label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Enter employee email" required autocomplete="on">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Password">Password<span class="text-danger mx-1">*</span></label>
                        <input type="password" id="Password" class="form-control" name="Password" placeholder="Enter employee password" required autocomplete="on">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="CPassword">Confirm Password<span class="text-danger mx-1">*</span></label>
                        <input type="password" id="CPassword" class="form-control" name="CPassword" placeholder="Retype Password" required autocomplete="on">
                    </div>

                    <!-- Add more fields as needed -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Employee</button>
                </div>
            </div>
        </div>
    </div>
</form>

</html>

<!-- Validate Password  -->
<script>
    function validatePassword() {
        var password = document.getElementById("Password").value;
        var cPassword = document.getElementById("CPassword").value;

        if (password !== cPassword) {
            alert("Passwords do not match. Please re-enter.");
            return false;
        }

        return true;
    }

    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("Password");
        const cPasswordInput = document.getElementById("CPassword");

        cPasswordInput.addEventListener("input", function() {
            if (passwordInput.value !== cPasswordInput.value) {
                cPasswordInput.setCustomValidity("Passwords do not match.");
            } else {
                cPasswordInput.setCustomValidity("");
            }
        });
    });
</script>