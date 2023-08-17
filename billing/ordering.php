<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            max-width: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            margin-top: 1%;
            max-width: 100%;
            justify-content: space-between;
            align-items: flex-start;
        }

        .content {
            width: 100%;
        }

        .app-title {
            text-align: center;
            font-size: 28px;
            color: #343a40;
            margin-bottom: 20px;
        }

        .table-container {
            margin-top: 20px;

        }

        .add-button {
            margin-top: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .wide-table {
            width: 100%;
            /* Adjust the width as needed */
        }
    </style>
</head>

<body>
    <?php
    $host = 'localhost';
    $dbName = 'zaratehospital';
    $username = 'root';
    $password = '';

    // Establish a database connection
    $conn = new mysqli($host, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to get the last SalesID
    function getLastSalesID($conn)
    {
        $query = "SELECT MAX(SalesID) AS LastSalesID FROM sales_tb";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['LastSalesID'];
        } else {
            return 0; // If no records found
        }
    }

    // Get the last SalesID
    $lastSalesID = getLastSalesID($conn);

    // Close the database connection
    $conn->close();
    ?>

    <div>
        <form method="POST" action="databasefunctions.php" id="addItemForm" class="container">
            <div class="content">
                <h1 class="app-title text-center">BILLING SYSTEM</h1>
                <!-- Additional Information Section -->
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product Code</th>
                                    <th>Inventory</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Discount %</th>
                                    <th>Discount Amount</th>
                                    <th>Sub-Total</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr name="templateRow" style="display: none;">
                                    <td><input type="text" class="form-control" name="product_id[]" placeholder="Enter product ID"></td>
                                    <td><input type="text" class="form-control" readonly name="inv"></td>
                                    <td><input type="number" class="form-control" name="qty[]"></td>
                                    <td><input type="text" class="form-control" name="unit" readonly></td>
                                    <td><input type="number" class="form-control" name="price[]" step="0.01"></td>
                                    <td><input type="number" class="form-control" name="disc_percent[]"></td>
                                    <td><input type="number" class="form-control" name="disc_amt[]" step="0.01" readonly></td>
                                    <td><input type="text" class="form-control" name="subtotal[]" readonly></td>
                                    <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary add-button" id="addRow">ADD PRODUCT</button>
                </div>
            </div>

            <div class="sidebar p-4 fw-bold">
                <h3 class="app-title">E. ZARATE HOSPITAL</h3>
                <div class="additional-info p-3 bg-dark text-white">
                    <div class="form-group">
                        <label for="chargeSlipNumber">Charge Slip Number</label>
                        <input type="text" class="form-control" name="chargeSlipNumber" placeholder="Enter Charge Slip Number" required value="<?php echo "00" . ($lastSalesID + 1); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="patientAccountName">Patient Account Code</label>
                        <input type="text" class="form-control" name="patientAccountName" placeholder="Enter Patient Account Name" required>
                    </div>
                    <div class="form-group">
                        <label for="requestedByName">Requested By: </label>
                        <input type="text" class="form-control" name="requestedByName" placeholder="Enter Requested By Name" required>
                    </div>
                    <div class="form-group">
                        <label for="enteredByName">Entered By: </label>
                        <input type="text" class="form-control" name="enteredByName" placeholder="Enter Entered By Name" required>
                    </div>


                    <div class="net-sale">
                        <label for="netSale">Net Sale</label>
                        <input type="text" class="form-control text-danger" name="netSale" readonly value="0.00">
                    </div>
                    <div class="additional-discount">
                        <label for="additionalDiscount">Additional Discount (%)</label>
                        <input type="number" class="form-control" name="additionalDiscount" min="0" value="0" requried>
                    </div>
                    <div class="net-amount">
                        <label for="netAmount">Net Amount</label>
                        <input type="text" class="form-control text-danger" name="netAmount" readonly value="0.00">
                    </div>
                    <div class="amount-tendered">
                        <label for="amountTendered">Amount Tendered</label>
                        <input type="number" class="form-control" name="amountTendered" min="0" value="0" requried>
                    </div>
                    <div class="change">
                        <label for="change">Change</label>
                        <input type="text" class="form-control text-danger" name="change" readonly value="0.00">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary add-button" name="SaveItem">Save Transaction</button>
            </div>
        </form>
    </div>

    <script>
        // Your JavaScript code here

        // Function to remove a row
        function removeRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        // Function to add a new row
        function addRow() {
            const templateRow = document.querySelector('[name="templateRow"]');
            const newRow = templateRow.cloneNode(true);
            newRow.removeAttribute("style"); // Show the cloned row

            // Clear values of cloned input fields
            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(input => {
                input.value = "";
            });

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
            const qty = parseFloat(row.querySelector('[name="qty[]"]').value) || 0;
            const discPercent = parseFloat(row.querySelector('[name="disc_percent[]"]').value) || 0;

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