<!DOCTYPE html>
<html lang="en">
<?php
require_once '../php/connect.php';
$conn = connect();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];

// Create a function to retrieve the employee reference
function getEmployeeReference($conn, $username)
{
    $escapedUsername = $conn->real_escape_string($username);

    $queryValue = "SELECT title, lname, fname, mname, position AS reference FROM employee_tb WHERE userName = '$escapedUsername'";
    $result = $conn->query($queryValue);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['reference'];
    } else {
        return 'No Records'; // Return an empty string if no records found
    }
}

// Assuming you have a valid database connection in $conn
$employeeReference = getEmployeeReference($conn, $username);

// Function to get the last SalesID
function getLastSalesID($conn)
{
    $querySalesID = "SELECT MAX(SalesID) AS LastSalesID FROM sales_tb";
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

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering System</title>
    <!-- Add this to your HTML <head> section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    </style>

</head>

<body class="fluid bg-dark" style="background-color: black;">
    <form method="POST" action="databasefunctions.php" id="addItemForm" class="container-fluid p-3" autocomplete="off">
        <div class="row text-white mb-4">
            <h3 class="app-title mt-4 text">CHARGE IPD BILLING /PATIENT INFORMATION</h3>
            <div class="col-md-6 p-4">
                <div class="row">
                    <div class="form-group fw-bold">
                        <label for="chargeSlipNumber">Charge Slip Number</label>
                        <input type="text" class="form-control text-light bg-secondary" name="chargeSlipNumber" placeholder="Enter Charge Slip Number" required value="<?php echo "00" . ($lastSalesID + 1); ?>" readonly>
                    </div>
                    <!-- <div class="form-group fw-bold">
                            <label for="chargeSlipNumber">Billing Number</label>
                            <input type="text" class="form-control text-light " name="billingnumber" placeholder="Enter Billing Number" required value="">
                        </div> -->
                    <div class="form-group row">
                        <div class="form-group col-md-6 was-validated ">
                            <label for="patientAccountName">Patient Account Code</label>
                            <input type="text" class="form-control" name="patientAccountName" list="patientAccountName" placeholder="Enter Patient Account Name" required>
                            <datalist id="patientAccountName">
                                <?php
                                require_once '../php/connect.php';
                                $conn = connect();
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $query = "SELECT fname , lname , mname , hospistalrecordNo FROM patient_tb";
                                $result = $conn->query($query);
                                while ($row = $result->fetch_assoc()) {

                                    $hospistalrecordNo = $row['hospistalrecordNo'];
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $mname = $row['mname'];
                                    $fullName = $lname . ',' . $fname . ' ' . $mname . ' | ID: ' . $hospistalrecordNo;

                                    echo "<option value='$fullName'>$fullName</option>";
                                }
                                $conn->close();
                                ?>

                            </datalist>
                            <div class="invalid-feedback">Please enter the patient account code.</div>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="opdRadio" name="patientAccountType" value="OPD" required>
                                <label class="form-check-label" for="opdRadio">OPD</label>
                                <div class="invalid-feedback">Please select a patient type.</div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ipdRadio" name="patientAccountType" value="IPD" required>
                                <label class="form-check-label" for="ipdRadio">IPD</label>
                                <div class="invalid-feedback">Please select a patient type.</div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group was-validated">
                        <label for="requestedByName">Requested By: </label>
                        <input type="text" class="form-control" name="requestedByName" list="requestedByName" placeholder="Enter Requested By Name" required>
                        <datalist id="requestedByName">
                            <?php
                            require_once '../php/connect.php';
                            $conn = connect();
                            $query = "SELECT title, position,fname , lname , mname, databaseID FROM employee_tb";
                            $result = $conn->query($query);
                            while ($row = $result->fetch_assoc()) {
                                $databaseID = $row['databaseID'];
                                $title = $row['title'];
                                $position = $row['position'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $mname = $row['mname'];
                                $Outputvalue = $title . '. ' . $lname . ',' . $fname . ' ' . $mname . ' | ' . $position . ' | ' . $databaseID;
                                echo "<option value='$Outputvalue'>$Outputvalue</option>";
                            }
                            $conn->close();
                            ?>
                        </datalist>
                        <div class="invalid-feedback">Please enter the requested by name.</div>

                    </div>
                    <div class="form-group was-validated">
                        <label for="enteredByName">Entered By: </label>
                        <input type="text" class="form-control" name="enteredByName" placeholder="Enter Entered By Name" value="<?php echo $employeeReference; ?>" required>
                        <div class="invalid-feedback">Please enter the entered by name.</div>
                    </div>
                    <h3 class="app-title mt-4 text">PRODUCT CART:</h3>
                </div>

            </div>
            <!-- Right Section -->
            <div class="col-md-6 p-4">
                <!-- Additional Info Section -->
                <div class="form-group fw-bold">
                    <label for="netSale">Net Sale</label>
                    <input type="text" class="form-control text-light bg-secondary" name="netSale" readonly value="0.00">
                </div>
                <div class="form-group was-validated">
                    <label for="additionalDiscount">Additional Discount (%)</label>
                    <input type="number" class="form-control" name="additionalDiscount" min="0" value="0" required>
                    <div class="invalid-feedback">Please enter a valid discount percentage.</div>
                </div>
                <div class="form-group fw-bold">
                    <label for="netAmount">Net Amount</label>
                    <input type="text" class="form-control text-light bg-secondary " name="netAmount" readonly value="0.00">
                </div>
                <div class="form-group was-validated">
                    <label for="amountTendered">Amount Tendered</label>
                    <input type="number" class="form-control" name="amountTendered" min="0" required>
                    <div class="invalid-feedback">Please enter a valid amount tendered.</div>
                </div>
                <div class="form-group fw-bold">
                    <label for="change">Change</label>
                    <input type="text" class="form-control text-light bg-secondary" name="change" readonly value="0.00" min="0">
                </div>
                <button type="submit" class="btn btn-primary add-button" name="SaveItem">Save Transaction</button>
            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive p-2">
                <table class="table table-bordered wide-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product Code</th>
                            <th>Inventory</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Item Type</th>
                            <th style="display:none">ID</th>
                            <th style="display:none">itemTypeID</th>
                            <th>Quantity</th>
                            <th>Discount %</th>
                            <th>Discount Amount</th>
                            <th>Sub-Total</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr name="templateRow" style="display: none;">
                            <td>
                                <input autocomplete="off" class="form-control" list="product_id_list" id="product_id_input" name="product_id[]" onchange="updateProductInfo(this)" />
                                <datalist id="product_id_list">
                                    <?php
                                    require_once '../php/connect.php';
                                    $conn = connect();
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $query = "SELECT inventory_tb.itemCode, itemtype_tb.itemTypeCode FROM inventory_tb LEFT JOIN itemtype_tb ON inventory_tb.itemTypeID = itemtype_tb.itemTypeID WHERE Status = 1  ";
                                    $result = $conn->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                        $itemCode = $row['itemCode'];
                                        $itemTypeCode = $row['itemTypeCode'];
                                        echo "<option value='$itemCode'>$itemTypeCode</option>";
                                    }
                                    $conn->close();
                                    ?>
                                </datalist>
                            </td>
                            <td><input type="number" class="form-control text-light bg-secondary" readonly name="inv"></td>
                            <td><input type="text" class="form-control text-light bg-secondary" name="unit[]" readonly></td>
                            <td><input type="number" class="form-control text-light bg-secondary" name="price[]" readonly step="0.01"></td>
                            <td><input type="text" class="form-control text-light bg-secondary" name="itemType[]" readonly></td>
                            <td style="display:none"><input type="number" style="display:none" class="form-control text-light bg-secondary" name="id[]" readonly></td>
                            <td style="display:none"><input type="number" style="display:none" class="form-control text-light bg-secondary" name="itemTypeID[]" readonly></td>
                            <td><input type="number" class="form-control" name="qty[]" min="1"></td>
                            <td><input type="number" class="form-control" name="disc_percent[]" min="0" value="0"></td>
                            <td><input type="number" class="form-control text-light bg-secondary" name="disc_amt[]" readonly></td>
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

            // Check if at least one checkbox is checked
            let isCheckboxChecked = false;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    isCheckboxChecked = true;
                }
            });

            if (!isCheckboxChecked) {
                isValid = false;
            }
            // Return true to submit the form if all validations pass
            return isValid;
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

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields.',
                });
            } else {
                const changeInput = document.querySelector('[name="change"]');
                const changeValue = parseFloat(changeInput.value);
                const changeFinalValue = changeValue * -1;
                const ipdRadio = document.querySelector('[id="ipdRadio"]');
                const opdRadio = document.querySelector('[id="opdRadio"]');
                if (!ipdRadio.checked && !opdRadio.checked) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Patient Type',
                        text: 'Please select either IPD or OPD.',
                    });
                } else if (changeValue < 0) {
                    if (opdRadio.checked) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Insufficient Tendered Amount',
                            html: `Click Yes to add the patient information and make this <span style="color: red;">${changeFinalValue}</span> the balance.`,
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            cancelButtonText: 'No'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open('../Patient/index.php', '_blank');
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // User clicked "No"
                            }
                        });
                    } else if (ipdRadio.checked) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'IPD Checked',
                            text: 'Please fill in all required fields.',
                        });
                    }
                }
            }
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
            xhr.open("GET", "get_product_details.php?itemCode=" + selectedValue, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        invInput.value = response.inv;
                        unitInput.value = response.unit;
                        priceInput.value = response.price;
                        itemTypeInput.value = response.itemtype;
                        idInput.value = response.id;
                        itemTypeIDInput.value = response.itemTypeID;

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
                if (input.getAttribute("name") === "disc_percent[]") {
                    nextInputValue = "0";
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
            const discPercent = parseFloat(row.querySelector('[name="disc_percent[]"]').value) || 0;
            const inventory = parseFloat(row.querySelector('[name="inv"]').value) || 0;
            const subtotal = qty * price;
            const discount = subtotal * (discPercent / 100);
            const totalWithDiscount = subtotal - discount;

            const subtotalInput = row.querySelector('[name="subtotal[]"]');
            subtotalInput.value = totalWithDiscount.toFixed(2);

            const DiscInput = row.querySelector('[name="disc_amt[]"]');
            DiscInput.value = discount.toFixed(2);

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
            const additionalDiscountInput = document.querySelector('[name="additionalDiscount"]');
            const additionalDiscountValue = parseFloat(additionalDiscountInput.value) || 0;

            const netAmount = netSale - (netSale * (additionalDiscountValue / 100));

            const netSaleInput = document.querySelector('[name="netSale"]');
            const netAmountInput = document.querySelector('[name="netAmount"]');
            const changeInput = document.querySelector('[name="change"]');

            netSaleInput.value = netSale.toFixed(2);
            netAmountInput.value = netAmount.toFixed(2);

            // Calculate and update change amount

            const amountTenderedInput = document.querySelector('[name="amountTendered"]');
            const amountTenderedValue = parseFloat(amountTenderedInput.value) || 0;
            const change = amountTenderedValue - netAmount;
            changeInput.value = change.toFixed(2);
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

            // Attach input listeners to additional discount and amount tendered input fields
            const additionalDiscountInput = document.querySelector('[name="additionalDiscount"]');
            if (additionalDiscountInput) {
                additionalDiscountInput.addEventListener("input", function() {
                    CalculateValues(document.querySelector("table"));
                });
            }

            const amountTenderedInput = document.querySelector('[name="amountTendered"]');
            if (amountTenderedInput) {
                amountTenderedInput.addEventListener("input", function() {
                    CalculateValues(document.querySelector("table"));
                });
            }
        });
    </script>
</body>

</html>