<!DOCTYPE html>
<html lang="en">
<?php
require_once '../php/connect.php';
$conn = connect();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$loggedInUser = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
$currentLoggedInEncoder = $loggedInUser->title . ' ' . $loggedInUser->lname . ',' . $loggedInUser->fname . ' ' . $loggedInUser->mname . ' | ID: ' . $loggedInUser->DatabaseID;
$currentLoggedInEncoderID = $loggedInUser->DatabaseID;

// Function to get the last SalesID
function getLastSalesID($conn)
{
    $querySalesID = "SELECT MAX(orderID ) AS LastSalesID FROM orders_tb";
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
    $querySalesID = "SELECT MAX(billingID) AS LastBillingID FROM billing_tb";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .custom-readonly-input {
            background-color: rgba(52, 53, 65, 0.5) !important;
            border-color: #664229 !important;
            /* Change this color to your desired background color */
        }
    </style>
</head>

<body class="fluid bg-light text-dark">
    <form method="POST" action="databasefunctions.php" id="addItemForm" class="container-fluid py-3 ps-3 pe-4" autocomplete="off">
        <h3 class="mt-4">WALK IN ORDER</h3>
        <div class="row rounded my-2 shadow bg-white p-3">
            <div class="col-md-6 p-4 ">
                <div class="row">
                    <div class="form-group my-2 fw-bold my-2f">
                        <label for="chargeSlipNumber">Order Number</label>
                        <input type="text" class="custom-readonly-input form-control text-light " name="chargeSlipNumber" placeholder="Enter Charge Slip Number" required value="<?php echo "00" . ($lastSalesID + 1); ?>" readonly>
                    </div>
                    <div class="my-2">
                        <?php include('./components/patient-selection.php') ?>
                    </div>
                    <div class="container-fluid mb-3 p-3 rounded bg-white shadow" id="additionalContent" style="display: none;">
                        <ul class="nav nav-tabs ">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#activeTab">Select Billing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#nameTab">New Billing</a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="enteredByName">Entered By: </label>
                        <input type="text" class="form-control is-valid text-light custom-readonly-input" name="enteredByName" list="employeeList" readonly correctData="employeesData" placeholder="Enter Entered By Name" value="<?= $currentLoggedInEncoder; ?>" sql-value="<?= $currentLoggedInEncoderID; ?>" required isvalidated="true">
                        <?php require_once('../API/datalist/employee.php') ?>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a valid requested by Name.
                        </small>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-6 p-4">
                <!-- Additional Info Section -->
                <div class="form-group my-2 fw-bold">
                    <label for="netSale">Net Sale</label>
                    <input type="text" class="form-control text-light custom-readonly-input" name="netSale" readonly value="0.00">
                </div>
                <div class="form-group my-2 was-validated">
                    <label for="additionalDiscount">Additional Discount (%)</label>
                    <input type="number" class="form-control" name="additionalDiscount" min="0" value="0" required>
                    <div class="invalid-feedback">Please enter a valid discount percentage.</div>
                </div>
                <div class="form-group my-2 fw-bold">
                    <label for="netAmount">Net Amount</label>
                    <input type="text" class="form-control text-light custom-readonly-input " name="netAmount" readonly value="0.00">
                </div>
                <div class="form-group my-2 was-validated">
                    <label for="amountTendered">Amount Tendered</label>
                    <input type="number" class="form-control" name="amountTendered" min="0" required>
                    <div class="invalid-feedback">Please enter a valid amount tendered.</div>
                </div>
                <div class="form-group my-2 fw-bold">
                    <label for="change">Change</label>
                    <input type="number" class="form-control text-light custom-readonly-input" name="change" id="change" step="0.1" value="0.00" readonly>
                </div>
                <button type="submit" class="btn btn-primary add-button" name="SaveItem">Save Transaction</button>
            </div>
        </div>

        <div class="row my-3">
            <div class="table p-3 shadow rounded bg-white">
                <h4 class="app-title ">SELECT PRODUCT</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered wide-table rounded">
                            <thead style="background-color: #987554" class="rounded">
                                <tr class="">
                                    <th class="col-3 text-white">Product Name</th>
                                    <th class="col-1 text-white">Unit</th>
                                    <th class="col-1 text-white">Price</th>
                                    <th class="col-1 text-white">Type</th>
                                    <th class="col-1 text-white" style="display:none">ID</th>
                                    <th class="col-1 text-white" style="display:none">itemTypeID</th>
                                    <th class="col-1 text-white">Quantity</th>
                                    <th class="col-1 text-white d-none">Discount %</th>
                                    <th class="col-1 text-white d-none">Discount Amount</th>
                                    <th class="col-2 text-white">Sub Total</th>
                                    <th class="col-0 text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr name="templateRow" style="display: none;">
                                    <td>
                                        <input autocomplete="off" class="form-control" list="productList" id="product_id_input" name="product_id[]" placeholder="Please select a product" onchange="updateProductInfo(this)" />
                                        <input type="hidden" id="product_desciption" name="product_desciption[]" />
                                        <datalist id="product_id_list">
                                            <?php require_once('../API/datalist/product-list.php') ?>
                                        </datalist>
                                    </td>
                                    <td class="d-none"><input type="hidden" class="form-control text-light custom-readonly-input" readonly name="inv"></td>
                                    <td><input type="text" class="form-control text-light custom-readonly-input" name="unit[]" readonly></td>
                                    <td><input type="number" class="form-control text-light custom-readonly-input" name="price[]" readonly step="0.01"></td>
                                    <td><input type="text" class="form-control text-light custom-readonly-input" name="itemType[]" readonly></td>
                                    <td style="display:none"><input type="number" style="display:none" class="form-control text-light custom-readonly-input" name="id[]" readonly></td>
                                    <td style="display:none"><input type="number" style="display:none" class="form-control text-light custom-readonly-input" name="itemTypeID[]" readonly></td>
                                    <td><input type="number" class="form-control" name="qty[]" min="1"></td>
                                    <td class="d-none"><input type="number" class="form-control" name="disc_percent[]" min="0" value="0"></td>
                                    <td class="d-none"><input type="number" class="form-control text-light custom-readonly-input" name="disc_amt[]" readonly></td>
                                    <td><input type="text" class="form-control text-light custom-readonly-input" name="subtotal[]" readonly></td>
                                    <td class="d-flex h-100"><button class="btn btn-danger btn-sm fw-bold my-auto" style="font-size: 10px" onclick="removeRow(this)"> Remove Item </button></td>
                                    <td class="d-none"><input type="hidden" class="form-control text-light custom-readonly-input" name="image[]" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary add-button rounded" id="addRow">ADD PRODUCT</button>
            </div>
        </div>
    </form>

    <script src="/Zarate/dependency/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <script src="/Zarate/dependency/sweetalert/sweetalert2.min.js"></script>
    <script type="module">
        import {
            validateDataList
        } from "../costum-js/datalist.js";
        $(document).ready(function() {
            validateDataList({
                employeesData: JSON.parse('<?= $employeesData ?>')
            });
        });
    </script>
    <script defer script src="./charge.js"></script>
</body>

</html>