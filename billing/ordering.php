<!DOCTYPE html>
<html>

<head>
    <title>Ordering System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            max-width: 100%;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 50px;
        }

        .sidebar {
            border-right: 1px solid #dee2e6;
            padding: 20px;
            background-color: #fff;
            width: 30%;
            min-height: 100vh;
        }

        .content {
            width: 100%;
            padding: 20px;
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
    <div class="container">
        <div class="content ">
            <h1 class="app-title text-center">BILLING SYSTEM</h1>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product ID</th>
                                <th>Inv</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Disc %</th>
                                <th>Disc Amt</th>
                                <th>SubTotal</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="templateRow" style="display: none;">
                                <td><input type="text" class="form-control" name="product_id[]"
                                        placeholder="Enter product ID" /></td>
                                <td><input type="text" class="form-control" readonly name="inv" /></td>
                                <td><input type="number" class="form-control" name="qty" /></td>
                                <td><input type="text" class="form-control" name="unit" readonly /></td>
                                <td><input type="number" class="form-control" name="price" step="0.01" /></td>
                                <td><input type="number" class="form-control" name="disc_percent" /></td>
                                <td><input type="number" class="form-control" name="disc_amt" step="0.01"readonly /></td>
                                <td><input type="text" class="form-control" name="subtotal" readonly /></td>
                                <td><button class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary add-button" id="addRow">Add Row</button>

            </div>
        </div>
        <div class="sidebar">
            <h3 class="app-title">E. ZARATE MEDICAL HOSPITAL</h3>
            <div class="net-sale">
                <label for="netSale">Net Sale</label>
                <input type="text" class="form-control text-danger" id="netSale" readonly value="0.00">
            </div>
            <div class="additional-discount">
                <label for="additionalDiscount">Additional Discount (%)</label>
                <input type="number" class="form-control" id="additionalDiscount" min="0" value="0">
            </div>
            <div class="net-amount">
                <label for="netAmount">Net Amount</label>
                <input type="text" class="form-control text-danger" id="netAmount" readonly value="0.00">
            </div>
            <div class="amount-tendered">
                <label for="amountTendered">Amount Tendered</label>
                <input type="number" class="form-control" id="amountTendered" min="0" value="0">
            </div>
            <div class="change">
                <label for="change">Change</label>
                <input type="text" class="form-control text-danger" id="change" readonly value="0.00">
            </div>
            <div class="button text-center">
                <button class="btn btn-secondary add-button" onclick="printTable()">Print Table</button>
                <button class="btn btn-primary add-button" id="addRow" onclick="Calculate()">Calculate</button>
            </div>
        </div>
    </div>

    <script>

        function removeRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function printTable() {
            const printWindow = window.open('', '', 'width=2000,height=5000');
            const tableCopy = document.querySelector("table").outerHTML;
            printWindow.document.write("<html><head><title>Print Table</title>");
            printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h1 class="app-title">E. ZARATE MEDICAL HOSPITAL</h1>');
            printWindow.document.write(tableCopy);
            printWindow.document.write("</body></html>");
            printWindow.document.close();
            printWindow.print();
        }

        // Event listener for the "Add Row" button
        document.getElementById("addRow").addEventListener("click", addRow);

        // Function to add a new row
        function addRow() {
            const templateRow = document.getElementById("templateRow");
            const newRow = templateRow.cloneNode(true);
            newRow.removeAttribute("style"); // Show the cloned row

            // Add the new row to the table
            const tbody = document.querySelector(".table tbody");
            tbody.appendChild(newRow);

            // Display values in console logs and calculate subtotal
            const inputFields = newRow.querySelectorAll("input");
            inputFields.forEach(input => {
                input.addEventListener("input", function () {
                    CalculateValues(newRow);
                }); 
            });
        }
            
        // Function to display values in console log and calculate subtotal
        function CalculateValues(row) {
            const price = parseFloat(row.querySelector('[name="price"]').value);
            const qty = parseFloat(row.querySelector('[name="qty"]').value);
            const discPercent = row.querySelector('[name="disc_percent"]').value;
            const discAmt = row.querySelector('[name="disc_amt"]').value;
           

            const subtotal = qty * price;
            const discount = subtotal * (discPercent / 100);
            const TotalDisc = subtotal - discount;

            console.log("Qty:", qty);
            console.log("Price:", price);
            console.log("SubTotal:", subtotal);
            console.log("Discount:", discount);
            console.log("Total Discount:", TotalDisc);

            const subtotalInput = row.querySelector('[name="subtotal"]');
            subtotalInput.value = TotalDisc.toFixed(2);

            const DiscInput = row.querySelector('[name="disc_amt"]');
            DiscInput.value = discount.toFixed(2);
        }


    </script>
</body>

</html>