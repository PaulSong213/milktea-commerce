<form method="POST" action="addfunction.php">

    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                    <button type="button" class="close" id="Closemodal1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content goes here -->
                    <label for="item_code">Item Code:</label>
                    <input type="text" id="item_code" name="item_code" class="form-control"
                        placeholder="Enter item code" required>

                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <option value="type3">Type 3</option>
                    </select>

                    <label for="Unit">Unit:</label>
                    <input type="number" id="Unit" class="form-control" name="Unit" placeholder="Enter Unit" required>

                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        placeholder="Enter description" required></textarea>

                    <label for="Generic">Generic:</label>
                    <input type="text" id="Generic" class="form-control" name="Generic" placeholder="Enter Generic">

                    <label for="Sugprice">Sug Price:</label>
                    <input type="number" id="Sugprice" class="form-control" name="Sugprice" placeholder="0.0000">

                    <label for="MWprice">MW Price:</label>
                    <input type="number" id="MWprice" class="form-control" name="MWprice" placeholder="0.00">

                    <label for="IPDprice">IPD Percent:</label>
                    <input type="number" id="IPDprice" class="form-control" name="IPDprice" placeholder="0.00 %">

                    <label for="Ppriceuse">Ppriceuse:</label>
                    <input type="number" id="Ppriceuse" class="form-control" name="Ppriceuse" placeholder="0.0000">
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




