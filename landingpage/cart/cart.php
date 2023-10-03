<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Custom CSS -->

    <style>
        /* CSS for Category Boxes */
        .category-sidebar {
            overflow-y: auto;
            height: 500px;
            border-right: 1px solid #ccc;
        }

        /* CSS for Category Content */
        .category-content-container {
            padding: 20px;
            color: #000;
            /* Change text color to black */
        }

        .category-content {
            animation: fade-in 0.5s ease-in-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Additional Styles for Shopping Cart */
        .modal-content {
            border-radius: 0;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .modal-title {
            font-size: 24px;
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        .table {
            border: 1px solid #dee2e6;
        }

        .table th,
        .table td {
            border: none;
        }

        .btn-primary {
            background-color: #ff5722;
            /* Change to a prominent color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff4500;
            /* Darker shade on hover */
        }

        .btn-secondary {
            background-color: #fff;
            border: none;
            color: #000;
        }

        .btn-secondary:hover {
            background-color: #f0f0f0;
        }

        .close {
            font-size: 24px;
            color: #000;
        }

        h5 {
            font-size: 18px;
        }
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
                        <!-- Add the following code inside your modal-body div, after the cart table -->
                        <!-- Payment Method -->
                        <div class="form-group">
                            <label for="paymentMethod">Payment Method</label>
                            <select class="form-control" id="paymentMethod" name="paymentMethod">
                                <option value="Cash">Cash</option>
                                <option value="Gcash">Gcash</option>
                                <option value="bank">Bank Transfer</option>
                            </select>
                        </div>
                        <!-- Standard Shipping Price -->
                        <div class="form-group row">
                            <label for="shippingPrice" class="col-sm-6">Standard Shipping Price</label>
                            <div class="col-sm-6">
                                <p id="shippingPrice" class="text-right">$5.00</p>
                            </div>
                        </div>
                        <!-- Address Section -->
                        <div class="form-group">
                            <label for="address">Shipping Address</label>
                            <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                        </div>
                    </div>
                    <!-- Total Amount -->
                    <div class="form-group row text-right">
                        <h5>Total Amount: <span>$19.99</span></h5>
                    </div>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- hidden value -->
                    <input type="hidden" name="order" id="order" value="">
                    <input type="hidden" name="total" id="total" value="">
                    <input type="hidden" name="category" id="category" value="">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
                    <button type="button" class="btn btn-primary">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

</script>

</html>