<!DOCTYPE html>

<html lang="en">

<form method="POST" action="addfunction.php">

    <Save class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
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
                    
                     <!--First Name -->
                    <b><label for="type">Last Name</label></b>
                    <input type="text" id="item_code" name="employee_lname" class="form-control"
                        placeholder="Enter employee last name" required>
                    
                     <b><label for="type">First Name : </label></b>
                    <input type="text" id="item_code" name="employee_fname" class="form-control"
                        placeholder="Enter employee first name" required>

                     <b><label for="type">Middle Name : </label></b>
                    <input type="text" id="item_code" name="employee_mname" class="form-control"
                        placeholder="Enter employee middle name" required>

                     <b><label for="type">Nickname : </label></b>
                    <input type="text" id="item_code" name="employee_nickname" class="form-control"
                        placeholder="Enter employee nickname" required>

                     <b><label for="type">Birth of Date : </label></b>
                        <input type="date" id="item_code" name="employee_bdate" class="form-control"
                        placeholder="Enter employee middle name" >

                       <b><label for="type">Marital Status : </label></b>
                    <select class="form-control" id="type" name="marital">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                    </select>

                     <b><label for="type">Sex : </label></b>
                    <select class="form-control" id="type" name="sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                      <b><label for="type">Department : </label></b>
                      <select class="form-control" id="type" name="dept">
                        <option value="IT Department">IT Department</option>
                        <option value="Admin Department">Admin Department</option>
                        <option value="Information Department">Information Department</option>
                        <option value="HMO Department">HMO Department</option>
                        <option value="OR Department">OR Department</option>
                        <option value="IP Department">IP Department</option>
                        <option value="Accounting Department">Accounting Department</option>
                    </select>

                    <b><label for="type">Title: </label></b>
                    <select class="form-control" id="type" name="title">
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Intern">Intern</option>
                    </select>

                     <b><label for="type">Position : </label></b>
                     <input type="text" id="item_code" name="position" class="form-control"
                     placeholder="Enter Position" >
                  
                         <b><label for="type">Position : </label></b>
                        <input type="date" id="item_code" name="employee_sdate" class="form-control"
                        placeholder="Enter employee middle name" >

                     <b><label for="type">Email : </label></b>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter employee email" required>

                    <b><label for="type">Password : </label></b>
                    <input type="password" id="Password" class="form-control" name="Password" placeholder="Enter employee password" required>
                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Employee</button>
                </div>
            </div>
        </div>
    </Save Employee
</form>
</html>