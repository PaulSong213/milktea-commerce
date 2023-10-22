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
                            <div class="col-12">
                                <div class="table-responsive " style="overflow-x: scroll;">
                                    <table class="table mt-4 rounded text-wrap" id="cartTable">
                                        <thead>
                                            <tr>
                                                <th style="display:none;">Product ID</th>
                                                <th>Product Image</th>
                                                <th>Product</th>
                                                <th>Size</th>
                                                <th style="max-width: 1%;">Qty</th>
                                                <th>Sugar Level</th>
                                                <th>addOns</th>
                                                <th>Price</th> <!-- Added price column -->
                                                <th>Action</th> <!-- Added remove action column -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="Promo" style="font-weight: bold; color: #333;">Promo Code:</label>
                                <div style="position: relative;">
                                    <input list="promoOptions" id="Promo" name="Promo" value="" placeholder="Select Promo Code" class="form-control" style="padding-right: 40px;">
                                    <datalist id="promoOptions">
                                        <!-- Add more options as needed -->
                                    </datalist>
                                    <span style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);">
                                        <i class="fa fa-gift" style="color: #888; font-size: 20px;"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Delivery Method -->
                            <div class="form-group">
                                <label for="deliveryMethod">Delivery Method</label>
                                <select class="form-select" id="deliveryMethod" name="deliveryMethod">
                                    <option value="online-delivery">Online Delivery</option>
                                    <option value="pick-up">Pick Up</option>
                                </select>
                            </div>

                            <!-- Payment Method -->
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <select class="form-select" id="paymentMethod" name="paymentMethod">
                                    <option value="online">Online Payment</option>
                                    <!-- <option value="cash-on-delivery">Cash on Delivery</option> -->
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
                            <h3>TOTAL: ₱ <span name="totalValue" id="totalValue">0.00</span> </h3>
                        </div>
                        <input type="text" name="costumerID" id="costumerID" value='<?= json_decode($_SESSION["costumer"])->costumerID ?>'>
                        <input type="hidden" name="orders" id="orders" value="">

                    </form>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- hidden value -->

                    <button type="button" class="btn btn-secondary" onclick="Close()">Continue Shopping</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary " onclick="collectTableData()">Proceed to Checkout</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#deliveryMethod").change(function() {
            if ($(this).val() == "pick-up") {
                $("#paymentMethod").append('<option value="cash-on-delivery">Cash on Delivery</option>');
            } else {
                $("#paymentMethod").find("option[value='cash-on-delivery']").remove();
            }
        });
    });

    function Close() {
        $('#categoryModal').modal('hide');
    }

    const orders = document.getElementById('orders');
    const shippingAddress = document.getElementById('shippingAddress');

    function collectTableData() {
        // Get the table element
        const table = document.getElementById("cartTable");
        const tbody = table.querySelector("tbody");
        const rows = tbody.querySelectorAll("tr");

        // Create an array to store the table data
        const data = [];
        $(".cartRow").each(function() {
            const cells = $(this).children("td");
            const image = $(this).find("img").attr("src");
            if (cells.length > 0) {
                const rowData = {};
                rowData.productId = cells[0].innerHTML;
                rowData.productName = cells[2].innerHTML;
                rowData.size = $(cells[3]).find("input").val();
                rowData.qty = $(cells[4]).find("input").val();
                console.log(cells[3], cells[4]);
                rowData.addOns = cells[5].innerHTML;
                rowData.subTotal = cells[7].innerHTML;
                rowData.image = image;
                console.log(rowData);
                data.push(rowData);
            }
        });


        // Convert the data array to a JSON string
        const jsonData = JSON.stringify(data);

        // You can send the jsonData to the server here using an AJAX request or other methods.
        console.log(JSON.parse(jsonData));
        orders.value = jsonData;
        const totalValue = $("#totalValue").text();
        if (Number(totalValue) < 100 && $("#paymentMethod").val() === "online") {
            Swal.fire({
                icon: 'error',
                title: 'Online Transaction has P100 minimum amount',
            })
        } else {
            // Submit the form
            document.getElementById("addItemForm").submit();
        }

    }

    let totalnetsale;
    const totalValue = document.getElementById('totalValue');

    function calculateTotalPrice() {
        // Get the table element by its ID
        const salesTable = document.getElementById('cartTable');
        totalnetsale = 0;
        // Get all the rows in the table
        const rows = salesTable.querySelectorAll('tr');

        rows.forEach(row => {
            const priceCell = row.querySelector("td:nth-child(8)"); // 7th column is the Price column
            if (priceCell) {
                const priceText = priceCell.textContent.trim();
                const priceValue = parseFloat(priceText.replace(/[^\d.]/g, '')); // Extract numeric value
                if (!isNaN(priceValue)) {
                    totalnetsale += priceValue;
                }
            }
        });
        // Update the total netsale in the <span> element
        totalValue.textContent = totalnetsale.toFixed(2);
        // You can also log the total netsale to the console for debugging
        console.log("Total Netsale:", totalnetsale.toFixed(2));
        // collectTableData();
        loadPromoNames();
    }

    var promoName;
    var minimumSpend;
    var promoPercentage;

    function loadPromoNames() {
        $.ajax({
            url: 'promolist.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    var promoOptions = $('#promoOptions');
                    promoOptions.empty();

                    // Use map function to create an array of option elements
                    var options = data.map(function(promoInfo) {
                        promoName = promoInfo.promoName;
                        minimumSpend = promoInfo.minimumSpend;
                        promoPercentage = promoInfo.promoPercentage;

                        // Create a new option element for each promo name
                        var option = $('<option>').attr('value', promoName);

                        // Disable the option if minimumSpend is less than or equal to totalnetsale
                        if (minimumSpend >= totalnetsale) {
                            option.prop('disabled', true);
                        }
                        return option;
                    });

                    // Append all options to the select element at once
                    promoOptions.append(options);
                } else {
                    console.log('No promo names available.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error fetching promo names. Status: ' + textStatus + '. Error: ' + errorThrown);
            }
        });
    }
    // Add event listener for promoOptions select element
    $('#Promo').on('input', function() {
        // Get the selected promo name
        const selectedPromo = $(this).val();
        const selectedPromoPercentage = parseFloat(promoPercentage);

        // Calculate the discount amount
        const discountAmount = totalnetsale - ((selectedPromoPercentage / 100) * totalnetsale);

        // Log the discount amount to the console
        console.log("selectedPromo Amount:", selectedPromo);
        console.log("selectedPromoPercentage Amount:", selectedPromoPercentage);
        console.log('Selected promo:', selectedPromo);
        console.log("Discount Amount:", discountAmount);
        totalValue.textContent = discountAmount.toFixed(2);
        // You can add more code here to handle the selected promo
    });
</script>

</html>