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
                    <form method="POST" action="/milktea-commerce/landingpage/cart/databasefunction.php" id="addItemForm">
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

                            <div class="form-group">
                                <label for="paymentMethod">Promo</label>
                                <input type="text" id="cash" name="payment" value="Cash">
                            </div>

                            <!-- Payment Method -->
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <select class="form-select" id="paymentMethod" name="paymentMethod">
                                    <option value="online">Online Payment</option>
                                    <option value="cash-on-delivery">Cash on Delivery</option>
                                </select>
                            </div>

                            <!-- Address Section -->
                            <div class="form-group">
                                <label for="address">Shipping Address</label>
                                <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="4">
                                    <?php
                                    if (isset($_SESSION['costumer'])) {
                                        $costumer = json_decode($_SESSION['costumer'], true);
                                        $shippingAddress = $costumer['shippingAddress'];

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
                        <input type="text" name="costumerID" id="costumerID" value='<?= json_decode($_SESSION["costumer"])->costumerID ?>'>
                        <input type="hidden" name="orders" id="orders" value="">

                    </form>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- hidden value -->

                    <button type="button" class="btn btn-secondary" onclick="Close()">Continue Shopping</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary " onclick="collectAndSendDataToServer()">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
        $(".cartRow").each(function() {
            const cells = $(this).children("td");
            if (cells.length > 0) {
                const rowData = {};
                rowData.productId = cells[0].innerHTML;
                rowData.productName = cells[2].innerHTML;
                rowData.size = $(cells[3]).find("input").val();
                rowData.qty = $(cells[4]).find("input").val();
                console.log(cells[3], cells[4]);
                rowData.addOns = cells[5].innerHTML;
                rowData.subTotal = cells[6].innerHTML;
                console.log(rowData);
                data.push(rowData);
            }
        });


        // Convert the data array to a JSON string
        const jsonData = JSON.stringify(data);

        // You can send the jsonData to the server here using an AJAX request or other methods.
        console.log(JSON.parse(jsonData));
        orders.value = jsonData;

        // Submit the form
        document.getElementById("addItemForm").submit();
    }
</script>

</html>