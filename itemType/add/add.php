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
                        <h5 class="modal-title" id="addItemModalLabel">Add Item Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <div class="mb-3">
                            <label class="form-label" for="itemTypeCode">Item Type Code<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="itemTypeCode" name="itemTypeCode" class="form-control" placeholder="Enter Item Type code" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="departmentID">Department Reference<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="departmentID" name="departmentID" required>
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked name="is_consumable">
                            <label class="form-check-label" for="flexCheckChecked">
                                Is Consumable?
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter description" autocomplete="on"></textarea>
                        </div>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="SaveItem">Save
                            Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>