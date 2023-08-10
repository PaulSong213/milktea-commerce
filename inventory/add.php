<?php
// Database configuration
$host = 'localhost';
$dbName = 'zaratehospital';
$username = 'your_username';
$password = 'your_password';

// Establish a database connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request
$itemCode = $_POST['item_code'];
$type = $_POST['type'];
$unit = $_POST['Unit'];
$description = $_POST['description'];
$generic = $_POST['Generic'];
$sugPrice = $_POST['Sugprice'];
$mwPrice = $_POST['MWprice'];
$ipdPrice = $_POST['IPDprice'];
$ppriceUse = $_POST['Ppriceuse'];

// Prepare and execute SQL query
$sql = "INSERT INTO inventory_tb (itemCode, Type, Unit, Description, Generic, SugPrice, MWprice, IPDprice, pprice_use)
        VALUES ('$itemCode', '$type', '$unit', '$description', '$generic', '$sugPrice', '$mwPrice', '$ipdPercent', '$ppriceUse')";

if ($conn->query($sql) === TRUE) {
    echo "Item added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>


<!-- modal_content.php -->
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
                <input type="text" id="item_code" class="form-control" placeholder="Enter item code">

                <label for="type">Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="type1">Type 1</option>
                    <option value="type2">Type 2</option>
                    <option value="type3">Type 3</option>
                </select>

                <label for="Unit">Unit:</label>
                <input type="number" id="Unit" class="form-control" placeholder="Enter Unit">

                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"
                    placeholder="Enter description"></textarea>

                <label for="Generic">Generic:</label>
                <input type="text" id="Generic" class="form-control" placeholder="Enter Generic">

                <label for="Sugprice">Sug Price:</label>
                <input type="number" id="Sugprice" class="form-control" placeholder="0.0000">

                <label for="MWprice">MW Price:</label>
                <input type="number" id="MWprice" class="form-control" placeholder="0.00">

                <label for="IPDprice">IPD Percent:</label>
                <input type="number" id="IPDprice" class="form-control" placeholder="0.00 %">

                <label for="Ppriceuse">Ppriceuse:</label>
                <input type="number" id="Ppriceuse" class="form-control" placeholder="0.0000">



                <!-- Add more fields as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveItemButton">Save Item</button>
            </div>
        </div>
    </div>
</div>


