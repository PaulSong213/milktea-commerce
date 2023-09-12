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
                        <h5 class="modal-title" id="addItemModalLabel">Add Supplier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->

                        <!-- Supplier Code -->
                        <div class="mb-3">
                            <label class="form-label" for="supplier_code">Supplier Code<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="supplier_code" name="supplier_code" class="form-control" placeholder="Enter Supplier Code" autocomplete="on" required>
                        </div>

                        <!-- Supplier Name -->
                        <div class="mb-3">
                            <label class="form-label" for="supplier_name">Supplier Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="supplier_name" name="supplier_name" class="form-control" placeholder="Enter Supplier Name" autocomplete="on" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" autocomplete="on">
                        </div>

                        <!-- Telephone Number -->
                        <div class="mb-3">
                            <label class="form-label" for="telNum">Telephone Number</label>
                            <input type="text" id="telNum" name="telNum" class="form-control" placeholder="Enter Telephone Number" autocomplete="on">
                        </div>

                        <!-- Fax Number -->
                        <div class="mb-3">
                            <label class="form-label" for="faxNum">Fax Number</label>
                            <input type="text" id="faxNum" name="faxNum" class="form-control" placeholder="Enter Fax Number" autocomplete="on">
                        </div>

                        <!-- Cellphone Number -->
                        <div class="mb-3">
                            <label class="form-label" for="CelNum">Cellphone Number</label>
                            <input type="text" id="CelNum" name="CelNum" class="form-control" placeholder="Enter Cellphone Number" autocomplete="on">
                        </div>

                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label class="form-label" for="contactNo">Contact Number</label>
                            <input type="text" id="contactNo" name="contactNo" class="form-control" placeholder="Enter Contact Number" autocomplete="on">
                        </div>

                        <!-- Supplier Note -->
                        <div class="mb-3">
                            <label class="form-label" for="note">Supplier Note</label>
                            <input type="text" id="note" name="note" class="form-control" placeholder="Enter Supplier Note" autocomplete="on">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="SaveItem">Save
                                Item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>