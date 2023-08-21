<!DOCTYPE html>

<html lang="en">

<form method="POST" action="addfunction.php">

    <Save class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
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

                    
                   
                    

                    <b><label for="type">Supplier Name</label></b>
                    <input type="text" id="supplier_code" name="supplier_name" class="form-control" placeholder="Enter Supplier name" required>

                    <b><label for="type">Address: </label></b>
                    <input type="text" id="supplier_code" name="address" class="form-control" placeholder="Enter Address"required>

                    <b><label for="type">Tel Number: </label></b>
                    <input type="text" id="supplier_code" name="telNum" class="form-control" placeholder="Enter Telephone Number"required >

                    <b><label for="type">Fax Number: </label></b>
                    <input type="text" id="supplier_code" name="faxNum" class="form-control" placeholder="Enter Fax Number" required>

                    <b><label for="type">Cel Number: </label></b>
                    <input type="text" id="supplier_code" name="celNum" class="form-control" placeholder="Enter Cellphone Number"required>

                    <b><label for="type">Contact Number: </label></b>
                    <input type="text" id="supplier_code" name="contactNum" class="form-control" placeholder="Enter Contact Number" required>

                    <b><label for="type">Note : </label></b>
                    <input type="text" id="supplier_code" name="Snote" class="form-control" placeholder="Enter Note">
  
                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Supplier</button>
                </div>
            </div>
        </div>
    </Save Supplier </form>

</html>