<!DOCTYPE html>
<html lang="en">
<?php
require_once '././php/connect.php';

// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['costumer'])) {
    $userData = json_decode($_SESSION['costumer'], true);
    $shippingAddress = $userData['shippingAddress'];
} else {
    // Redirect back to the login page or handle the user not being logged in
    header("Location: /milktea-commerce/index.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Custom CSS -->

    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
    <!-- The Modal -->
    <div class="modal fade" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true" id="categoryModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"> <i class="fas fa-shopping-cart"></i> Shopping Cart </h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body row">
                    <form method="post" action="databasefunction.php" id="addItemForm">
                        <div class="container-fluid p-3">
                            <div class="col-12" style="overflow-y: auto;" id="cartTable">
                                <table class="table mt-4 rounded" id="cartTable">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">Product ID</th>
                                            <th>Product Image</th>
                                            <th>Product</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                            <th>addOns</th>
                                            <th>Price</th> <!-- Added price column -->
                                            <th>Action</th> <!-- Added remove action column -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                        <!-- Add more rows for additional items -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <!-- Payment Method -->
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <select class="form-control" id="paymentMethod" name="paymentMethod">
                                    <option value="Cash">Cash</option>
                                    <option value="Gcash">Gcash</option>
                                    <option value="bank">Bank Transfer</option>
                                </select>
                            </div>

                            <!-- Address Section -->
                            <div class="form-group">
                                <label for="address">Shipping Address</label>
                                <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="4">
                                    <?php
                                    if (isset($_SESSION['customer'])) {
                                        echo $shippingAddress;
                                    } else {
                                        echo "Address not available. Please login or register.";
                                    }
                                    ?>
                                </textarea>
                            </div>
                        </div>
                        <!-- Total Amount -->
                        <div class="container text-right">
                            <h3>TOTAL: <span name="totalValue" id="totalValue">0.00</span></h3>
                        </div>
                    </form>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- hidden value -->
                    <input type="hidden" name="orders" id="orders" value="">
                    <button type="button" class="btn btn-secondary" onclick="Close()">Continue Shopping</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary " onclick="collectAndSendDataToServer()">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function Close() {
        $('#categoryModal').modal('hide');
    }

    const orders = document.getElementById('orders');
    const shippingAddress = document.getElementById('shippingAddress');
    const table = document.getElementById("cartTable");
    const tbody = table.querySelector("tbody");
    const rows = tbody.querySelectorAll("tr");

    function collectAndSendDataToServer() {
        const data = [];
        rows.forEach(row => {
            const cells = row.getElementsByTagName("td");
            if (cells.length > 0) {
                const rowData = [];
                cells.forEach(cell => {
                    rowData.push(cell.textContent.trim());
                });
                data.push(rowData);
            }
        });

        // Remove null rows from the data array
        const filteredData = data.filter(row => row.length > 0);

        // Convert the data array to a JSON string
        const jsonData = JSON.stringify(filteredData);

        // You can send the jsonData to the server here using an AJAX request or other methods.
        console.log(jsonData);
        orders.value = jsonData;
    }
</script>

</html>
