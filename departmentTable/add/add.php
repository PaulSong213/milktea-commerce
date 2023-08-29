<!DOCTYPE html>

<html lang="en">

<head>
    <script>
        function allowOnlyNumbers(input) {
            input.value = input.value.replace(/\D/g, ''); // Replace non-numeric characters with an empty string
        }
    </script>
</head>

<body>
 

<form id="addItemForm" method="POST" action="./add/addfunction.php">

    <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add New Supplier</h5>
                    <button type="button" class="close" id="Closemodal1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content goes here -->

                    <b><label for="supplier_name">Supplier Name</label></b>
                    <input type="text" id="supplier_name" name="supplier_name" class="form-control" placeholder="Enter Supplier name" required>

                    <b><label for="address">Address: </label></b>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" required>

                    <b><label for="telNum">Tel Number: </label></b>
                    <input type="text" id="telNum" name="telNum" class="form-control" placeholder="Enter Telephone Number" oninput="allowOnlyNumbers(this)" required>

                    <b><label for="faxNum">Fax Number: </label></b>
                    <input type="text" id="faxNum" name="faxNum" class="form-control" placeholder="Enter Fax Number" oninput="allowOnlyNumbers(this)" required>

                    <b><label for="CelNum">Cel Number: </label></b>
                    <input type="text" id="CelNum" name="CelNum" class="form-control" placeholder="Enter Cellphone Number" oninput="allowOnlyNumbers(this)" required>

                    <b><label for="contactNum">Contact Number: </label></b>
                    <input type="text" id="contactNum" name="contactNum" class="form-control" placeholder="Enter Contact Number" oninput="allowOnlyNumbers(this)" required>

                    <b><label for="Snote">Note : </label></b>
                    <input type="text" id="Snote" name="Snote" class="form-control" placeholder="Enter Note">

                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Supplier</button>
                </div>
            </div>
        </div>
    </div Supplier </div>
    </div>
</form>
</body>   

</html>