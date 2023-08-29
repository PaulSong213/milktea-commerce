<!DOCTYPE html>
<html lang="en">
<?php
require_once '../php/connect.php';
$conn = connect();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = isset($_SESSION['user']) ? $_SESSION['user'] : 'You are Logout';



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
                    <?php include('./components/patient-selection.php') ?>
                    <div class="form-group row">
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input inputTypeRadio" type="radio" checked="checked" id="opdRadio" name="patientAccountType" value="OPD" required>
                                <label class="form-check-label" for="opdRadio">OPD</label>
                                <div class="invalid-feedback">Please select a patient type.</div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input inputTypeRadio" type="radio" id="ipdRadio" name="patientAccountType" value="IPD" required>
                                <label class="form-check-label" for="ipdRadio">IPD</label>
                                <div class="invalid-feedback">Please select a patient type.</div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mb-3 p-3 rounded" id="additionalContent" style="display: none;background-color: #444465;">
                        <ul class="nav nav-tabs ">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" data-toggle="tab" href="#activeTab">Select Billing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" data-toggle="tab" href="#nameTab">New Billing</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div id="activeTab" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <label for="name">Billing Number:</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Billing NumberD" list="billingList" autocomplete="off">
                                        <?php require_once('../API/datalist/billing-list.php') ?>
                                    </div>
                                    <div class="col-md-3 ">
                                        <label for="Date">Admission Date:</label>
                                        <input type="text" class="form-control" id="Date" placeholder="" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-3 ">
                                        <label for="Date">Admission Date:</label>
                                        <input type="text" class="form-control" id="Date" placeholder="" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-3 ">
                                        <label for="Date">Admission Date:</label>
                                        <input type="text" class="form-control" id="Date" placeholder="" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>

                            <div id="nameTab" class="tab-pane fade">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requestedByName">Requested By: </label>
                        <input type="text" class="form-control is-invalid" name="requestedByName" list="employeeList" correctData="employeesData" placeholder="Enter Requested By Name" required>
                        <?php require_once('../API/datalist/employee-list.php') ?>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a valid requested by Name.
                        </small>
                    </div>
                    <div class="form-group was-validated">
                        <label for="enteredByName">Entered By: </label>
                        <input type="text" class="form-control is-invalid" name="enteredByName" list="employeeList" correctData="employeesData" placeholder="Enter Entered By Name" value="<?php echo $employeeReference; ?>" required>
                        <?php require_once('../API/datalist/employee-list.php') ?>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a valid requested by Name.
                        </small>
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
                    <input type="number" class="form-control text-light bg-secondary" name="change" id="change" step="0.1" value="0.00" readonly>
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
                                <input autocomplete="off" class="form-control" list="productList" id="product_id_input" name="product_id[]" onchange="updateProductInfo(this)" />
                                <datalist id="product_id_list">
                                    <?php require_once('../API/datalist/product-list.php') ?>
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
        document.addEventListener('DOMContentLoaded', function() {
            const radioInput = document.getElementById('ipdRadio');
            const additionalContent = document.getElementById('additionalContent');

            radioInput.addEventListener('change', function() {
                if (radioInput.checked) {
                    additionalContent.style.display = 'block';
                } else {
                    additionalContent.style.display = 'none';
                }
            });
        });


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
                            title: 'Insufficient Tendered Amount For OPD patient',
                            html: `Proceed First to the OPD and Register Patient to make <span style="color: red;">${changeFinalValue}</span> as balance.`,
                        });
                    } else if (ipdRadio.checked) {
                        event.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Insufficient Tendered Amount For IPD patient',
                            html: `Proceed First to the OPD and Register Patient to make <span style="color: red;">${changeFinalValue}</span> as balance.`,
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
            $('input[name="change"]').change();
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

    <script type="module">
        import {
            validateDataList
        } from "./js/datalist.js";
        validateDataList({
            patientsData: JSON.parse('<?= $patientsData ?>'),
            employeesData: JSON.parse('<?= $employeesData ?>')
        });
    </script>
</body>

</html>