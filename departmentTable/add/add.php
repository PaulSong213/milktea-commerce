<!DOCTYPE html>

<html lang="en">

<head>

</head>

<body>
    <form id="addItemForm" method="POST" action="./add/addfunction.php">
        <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add New Department</h5>
                        <button type="button" class="close" id="Closemodal1" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <b><label for="departmentName">Department Name</label></b>
                        <input type="text" id="departmentName" name="departmentName" class="form-control" placeholder="Enter Supplier name" required>
                        <b><label for="address">Department Description: </label></b>
                        <input type="text" id="departmentDescription" name="departmentDescription" class="form-control" placeholder="Enter Address" required>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Department</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>