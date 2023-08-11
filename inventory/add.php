<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggested Input Text</title>
</head>

<body>
    <form method="POST" action="addfunction.php" autocomplete="on">

        <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                        <button type="button" class="close" id="Closemodal1" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <label for="item_code">Item Code:</label>
                        <input type="text" id="item_code" name="item_code" class="form-control"
                            placeholder="Enter item code"  autocomplete="on" required>
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Input Type"
                            autocomplete="on">
                        <label for="Unit">Unit:</label>
                        <input type="number" id="Unit" class="form-control" name="Unit" placeholder="0" required>

                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Enter description" required autocomplete="on"></textarea>

                        <label for="Generic">Generic:</label>
                        <input type="text" id="Generic" class="form-control" name="Generic"
                            placeholder="Enter Generic" required autocomplete="on">

                        <label for="Sugprice">Sug Price:</label>
                        <input type="number" id="Sugprice" class="form-control" name="Sugprice" placeholder="0.0000"
                            required autocomplete="on">

                        <label for="MWprice">MW Price:</label>
                        <input type="number" id="MWprice" class="form-control" name="MWprice" placeholder="0.00"
                            required autocomplete="on">

                        <label for="IPDprice">IPD Percent:</label>
                        <input type="number" id="IPDprice" class="form-control" name="IPDprice"
                            placeholder="0.00 %" required autocomplete="on">

                        <label for="Ppriceuse">Ppriceuse:</label>
                        <input type="number" id="Ppriceuse" class="form-control" name="Ppriceuse" placeholder="0.0000"
                            required autocomplete="on">
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  name="SaveItem">Save
                            Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
