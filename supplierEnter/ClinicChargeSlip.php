<!DOCTYPE html>
<html lang="en">
<?php
require_once '../php/connect.php';
$conn = connect();
$loggedInUser = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
$currentLoggedInEncoder = $loggedInUser->title . ' ' . $loggedInUser->lname . ',' . $loggedInUser->fname . ' ' . $loggedInUser->mname . ' | ID: ' . $loggedInUser->DatabaseID;
$currentLoggedInEncoderID = $loggedInUser->DatabaseID;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Function to get the last SalesID
function getLastSalesID($conn)
{
    $querySalesID = "SELECT MAX(SalesID) AS LastSalesID FROM clinicuse_tb";
    $result = $conn->query($querySalesID);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['LastSalesID'];
    } else {
        return 0; // If no records found
    }
}
// Get the last SalesID
$lastSalesID = getLastSalesID($conn);

function getLastBillingID($conn)
{
    $querySalesID = "SELECT MAX(SalesID) AS LastBillingID FROM clinicuse_tb";
    $result = $conn->query($querySalesID);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['LastBillingID'];
    } else {
        return 0; // If no records found
    }
}
// Get the last SalesID
$LastBillingID = getLastBillingID($conn);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering System</title>
    <!-- Add this to your HTML <head> section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    .body {
        background-color: #006666;
    }
</style>

<body class="fluid body">
    <form method="POST" action="databasefunctions.php" id="addItemForm" class="container-fluid p-3" autocomplete="off">
        <div class="row text-white mb-4">
            <h3 class="app-title mt-4 text">Supplier Stock In</h3>
            <div class="col-md-6 p-4">
                <div class="row">
                    <div class="form-group fw-bold">
                        <label for="supplierRef">Supplier In Ref</label>
                        <input type="text" class="form-control text-light bg-secondary" name="supplierRef" placeholder="Enter Charge Slip Number" required value="<?php echo "00" . ($lastSalesID + 1); ?>" readonly>
                    </div>
                    <div class="form-group fw-bold">
                        <label for="department">Supplier Code</label>
                        <select class="form-control" name="supplier_code" required>
                            <option value="" disabled selected>Select Supplier Code</option>
                            <?php
                            // Connect to your database (replace with your database credentials)

                            $conn = connect();

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Query to fetch data from the database (replace with your actual query)
                            $sql = "SELECT * FROM supplier_tb";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['supplier_id'] . '">' . $row['supplier_code'] . '</option>';
                                }
                            }
                            // Close the database connection
                            $conn->close();
                            ?>
                        </select>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a Supplier Code.
                        </small>

                    </div>


                    <div class="form-group fw-bold">
                        <label for="requestedByName">Date In</label>
                        <input type="date" class="form-control is-invalid" name="date" id="dateInput">
                    </div>

                    <div class="form-group fw-bold">
                        <label for="requestedByName">Doc Number</label>
                        <input type="text" class="form-control is-invalid" name="docNum" placeholder="Enter Doc Number" required>

                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Enter Doc Number
                        </small>
                    </div>
                    <div class="form-group fw-bold">
                        <label for="requestedByName">PO Number</label>
                        <input type="text" class="form-control is-invalid" name="requestedByName" placeholder="Enter PO Number" required>

                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Enter PO Number
                        </small>
                    </div>



                    <h3 class="app-title mt-4 text">PRODUCT CART:</h3>
                </div>
            </div>
            <!-- Right Section -->
            <div class="col-md-6 p-4">
                <!-- Additional Info Section -->
                <div class="form-group fw-bold">
                    <label for="enteredByName">Recieved By: </label>
                    <input type="text" class="form-control is-valid text-light bg-secondary" name="recivedByName" list="employeeList" readonly correctData="employeesData" placeholder="Enter Entered By Name" value="<?= $currentLoggedInEncoder; ?>" sql-value="<?= $currentLoggedInEncoderID; ?>" required isvalidated="true">
                    <?php require_once('../API/datalist/employee.php') ?>
                    <small class="feedback d-none bg-danger p-1 rounded my-1">
                        Please select a valid requested by Name.
                    </small>
                </div>
                <div class="form-group fw-bold">
                    <label for="enteredByName">Entered By: </label>
                    <input type="text" class="form-control is-valid text-light bg-secondary" name="enteredByName" list="employeeList" readonly correctData="employeesData" placeholder="Enter Entered By Name" value="<?= $currentLoggedInEncoder; ?>" sql-value="<?= $currentLoggedInEncoderID; ?>" required isvalidated="true">
                    <?php require_once('../API/datalist/employee.php') ?>
                    <small class="feedback d-none bg-danger p-1 rounded my-1">
                        Please select a valid requested by Name.
                    </small>
                </div>
                <div class="form-group fw-bold">
                    <label for="requestedByName">Note</label>
                    <input type="textarea" class="form-control is-invalid" name="note" placeholder="Enter Note">

                    <small class="feedback d-none bg-danger p-1 rounded my-1">
                        Enter Note
                    </small>
                </div>

                <div class="form-group fw-bold">
                    <label for="netAmount">Grand Total</label>
                    <input type="text" class="form-control text-light bg-secondary " name="netAmount" readonly value="0.00">
                </div>
                <button type="submit" class="btn btn-primary add-button" name="SaveItem" id="saveButton">Save Transaction</button>
            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive p-2">
                <table class="table table-bordered wide-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product Code</th>
                            <th>Inventory</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Lot Number</th>
                            <th>Expiration</th>
                            <th>Subtotal</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr name="templateRow" style="display: none;">
                            <td>
                                <input autocomplete="off" class="form-control" list="productList" id="product_id_input" name="product_id[]" onchange="updateProductInfo(this)" />
                                <datalist id="product_id_list">
                                    <?php require_once('../API/datalist/product-list.php') ?>

                                </datalist>
                            </td>

                            <td><input type="number" class="form-control text-light bg-secondary" readonly name="inv"></td> <!-- Inventory -->
                            <td><input type="number" class="form-control" name="qty[]" min="1"></td> <!-- qty -->
                            <td><input type="text" class="form-control text-light bg-secondary" name="unit[]" readonly></td> <!-- unit -->
                            <td><input type="number" class="form-control text-light bg-secondary" name="price[]" step="0.01"></td>
                            <td><input type="number" class="form-control" name="lotnum[]" step="0.01"></td>
                            <td><input type="date" class="form-control" name="expdate[]" step="0.01"></td>
                            <td><input type="text" class="form-control text-light bg-secondary" name="subtotal[]" readonly></td>
                            <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)"> X </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary add-button" id="addRow">ADD PRODUCT</button>
        </div>
    </form>
    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script>
        function validateForm() {
            const form = document.getElementById('addItemForm');
            const inputFields = form.querySelectorAll('.form-control');
            let isValid = true;

            // Remove "was-validated" class from all elements
            inputFields.forEach(input => {
                input.classList.remove('is-invalid');
            });

            // Additional validation logic
            // Example: Check if required fields are empty
            inputFields.forEach(input => {
                if (input.hasAttribute('required') && input.value.trim() === '') {
                    input.classList.add('is-invalid');
                    isValid = false;
                }
            });
        }
        document.getElementById('addItemForm').addEventListener('submit', function(event) {
            // Validate the form
            const form = event.target;
            const checkboxes = form.querySelectorAll('.form-check-input');
            const inputFields = form.querySelectorAll('.form-control');
            let isValid = true;

            // Remove "was-validated" class from all elements
            inputFields.forEach(input => {
                input.classList.remove('is-invalid');
            });
            // Additional validation logic
            // Example: Check if required fields are empty
            inputFields.forEach(input => {
                if (input.hasAttribute('required') && input.value.trim() === '') {
                    input.classList.add('is-invalid');
                    isValid = false;
                }
            });
        });

        function updateProductInfo(input) {
            var selectedValue = input.value;
            var row = input.closest("tr");
            var invInput = row.querySelector('[name="inv"]');
            var unitInput = row.querySelector('[name="unit[]"]');
            var priceInput = row.querySelector('[name="price[]"]');
            var itemTypeInput = row.querySelector('[name="itemType[]"]');
            var idInput = row.querySelector('[name="id[]"]');
            var itemTypeIDInput = row.querySelector('[name="itemTypeID[]"]');
            var datalist = document.getElementById('product_id_list');

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/Zarate/billing_slip/getproductdetails.php?itemCode=" + selectedValue, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        console.log('itemTypeInput', itemTypeInput);

                        if (invInput) {
                            invInput.value = response.inv;
                        }
                        if (unitInput) {
                            unitInput.value = response.unit;
                        }
                        if (priceInput) {
                            priceInput.value = response.price;
                        }
                        if (itemTypeInput) {
                            itemTypeInput.value = response.itemtype;
                        }
                        if (idInput) {
                            idInput.value = response.id;
                        }
                        if (itemTypeIDInput) {
                            itemTypeIDInput.value = response.itemTypeID;
                        }

                        for (var i = 0; i < datalist.options.length; i++) {
                            if (datalist.options[i].value === selectedValue) {
                                datalist.options[i].disabled = true;
                                CalculateValues(row);
                                break;
                            }
                        }

                        console.log("Response:", response);
                    } else {
                        console.error("Failed to fetch product details");
                    }
                }
            };
            xhr.send();
        }


        function removeRow(button) {
            const row = button.parentNode.parentNode;
            const productIdInput = row.querySelector('[name="product_id[]"]');
            const productCode = productIdInput.value;

            const datalist = document.getElementById('product_id_list');
            const option = document.createElement('option');
            option.value = productCode;
            option.innerHTML = productIdInput.value; // Set the innerHTML
            datalist.appendChild(option);
            row.parentNode.removeChild(row);

            CalculateValues(row);

        }
        // Function to add a new row
        function addRow() {
            window.scrollTo(0, document.body.scrollHeight);
            const templateRow = document.querySelector('[name="templateRow"]');
            const newRow = templateRow.cloneNode(true);
            newRow.removeAttribute("style"); // Show the cloned row

            // Clear values of cloned input fields
            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(input => {
                let nextInputValue = "";
                if (input.getAttribute("name") === "qty[]") {
                    nextInputValue = "1";
                }
                input.value = nextInputValue;
            });
            attachInputListeners(newRow); // Add 
            // Add the new row to the table
            const tbody = document.querySelector("tbody");
            tbody.appendChild(newRow);
            attachInputListeners(newRow); // Attach input listeners to the new row
        }

        // Function to attach input listeners
        function attachInputListeners(row) {
            const inputFields = row.querySelectorAll("input");
            inputFields.forEach(input => {
                input.addEventListener("input", function() {
                    CalculateValues(row);
                });
            });
        }
        // Function to display values and calculate subtotal
        function CalculateValues(row) {
            const price = parseFloat(row.querySelector('[name="price[]"]').value) || 0;
            const qty = parseFloat(row.querySelector('[name="qty[]"]').value) || 1;
            // Remove the discount calculation lines
            const inventory = parseFloat(row.querySelector('[name="inv"]').value) || 0;
            const subtotal = qty * price;
            const subtotalInput = row.querySelector('[name="subtotal[]"]');
            subtotalInput.value = subtotal.toFixed(2);
            // Recalculate net sale
            const allSubtotalInputs = document.querySelectorAll('[name="subtotal[]"]');
            let netSale = 0;
            allSubtotalInputs.forEach(subtotalInput => {
                const subtotalValue = parseFloat(subtotalInput.value);
                if (!isNaN(subtotalValue)) {
                    netSale += subtotalValue;
                }
            });

            // Calculate and update net amount based on additional discount
            const netAmount = netSale;

            const netSaleInput = document.querySelector('[name="netSale"]');
            const netAmountInput = document.querySelector('[name="netAmount"]');
            netAmountInput.value = netAmount.toFixed(2);
        }
        document.addEventListener("DOMContentLoaded", function() {
            addRow();

            const addRowButton = document.getElementById("addRow");
            addRowButton.addEventListener("click", function() {
                addRow();

                // Attach input listeners to the new row
                const newRow = document.querySelector('tbody tr:last-child');
                attachInputListeners(newRow);
            });

            // Attach input listeners to initial rows
            const initialRows = document.querySelectorAll('tbody tr:not([name="templateRow"])');
            initialRows.forEach(row => {
                attachInputListeners(row);
            });

            const amountTenderedInput = document.querySelector('[name="amountTendered"]');
            if (amountTenderedInput) {
                amountTenderedInput.addEventListener("input", function() {
                    CalculateValues(document.querySelector("table"));
                });
            }
        });

        var now = new Date();
        var year = now.getFullYear();
        var month = String(now.getMonth() + 1).padStart(2, '0');
        var day = String(now.getDate()).padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;
        var hours = String(now.getHours()).padStart(2, '0');
        var minutes = String(now.getMinutes()).padStart(2, '0');
        var formattedTime = hours + ':' + minutes;
        $("#dateAdmitted").val(formattedDate);
        $("#timeAdmitted").val(formattedTime);
    </script>

    <script>
        // Get the current date in the format YYYY-MM-DD
        const currentDate = new Date().toISOString().split('T')[0];

        // Set the current date as the value of the input field
        document.getElementById('dateInput').value = currentDate;
    </script>


</body>

</html>