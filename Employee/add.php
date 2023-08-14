<!DOCTYPE html>

<html lang="en">

<form method="POST" action="addfunction.php">

    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
        aria-hidden="true">
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
                    <label for="item_code">Employee Code:</label>  <!--Employee Code -->
                    <input type="number" id="item_code" name="employee_code" class="form-control" 
                        placeholder="Enter employee code" required>
                    
                    <label for="item_code">Last Name:</label> <!--First Name -->
                    <input type="text" id="item_code" name="employee_lname" class="form-control"
                        placeholder="Enter employee last name" required>
                    
                     <label for="item_code">First Name:</label>
                    <input type="text" id="item_code" name="employee_fname" class="form-control"
                        placeholder="Enter employee first name" required>

                    <label for="item_code">Middle Name:</label>
                    <input type="text" id="item_code" name="employee_mname" class="form-control"
                        placeholder="Enter employee middle name" required>

                    <label for="item_code">Nickname:</label>
                    <input type="text" id="item_code" name="employee_nickname" class="form-control"
                        placeholder="Enter employee nickname" required>

                    <label for="item_code">Date of Birth:</label>
                        <input type="date" id="item_code" name="employee_bdate" class="form-control"
                        placeholder="Enter employee middle name" >

                      <label for="type">Marital Status</label>
                    <select class="form-control" id="type" name="marital">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>

                     <label for="type">Sex</label>
                    <select class="form-control" id="type" name="sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                      <label for="type">Department</label>
                      <option value="IT Department">IT Department</option>
                      <select class="form-control" id="type" name="dept">
                        <option value="Admin Department">Admin Department</option>
                        <option value="Information Department">Information Department</option>
                        <option value="HMO Department">HMO Department</option>
                        <option value="OR Department">OR Department</option>
                        <option value="IP Department">IP Department</option>
                        <option value="Accounting Department">Accounting Department</option>
                    </select>

                    <label for="type">Title</label>
                    <select class="form-control" id="type" name="title">
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Intern">Intern</option>
                    </select>

                     <label for="type">Position</label>
                    <select class="form-control" id="type" name="position">
                        <option value="Administrator">Administrator</option>
                        <option value="Owner">Owner</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Director in Charge">Director in Charge</option>
                    </select>
                   
                     <label for="item_code">Date Start:</label>
                        <input type="date" id="item_code" name="employee_sdate" class="form-control"
                        placeholder="Enter employee middle name" >

                    <label for="email">User Name:</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter employee email" required>

                    <label for="Password">Password:</label>
                    <input type="password" id="Password" class="form-control" name="Password" placeholder="Enter employee password" required>
                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Item</button>
                </div>
            </div>
        </div>
    </div>
</form>
</html>