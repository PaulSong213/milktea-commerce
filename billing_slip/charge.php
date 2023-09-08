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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <?php include('./components/patient-selection.php') ?>
                    <div class="form-group row">
                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input inputTypeRadio" type="radio" checked="checked" id="opdRadio" name="patientAccountType" value="OPD" required>
                                <label class="form-check-label" for="opdRadio">OUT PATIENT DEPT. (WALKIN/CASH)</label>
                                <div class="invalid-feedback">Please select a patient type.</div>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input inputTypeRadio" type="radio" id="ipdRadio" name="patientAccountType" value="IPD" required>
                                <label class="form-check-label" for="ipdRadio">IN PATIENT DEPT. (ADDMISION)</label>
                                <div class="invalid-feedback">Please select a patient type.</div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mb-3 p-3 rounded" id="additionalContent" style="display: none;background-color: #444465;">
                        <ul class="nav nav-tabs ">
                            <li class="nav-item">
                                <a class="nav-link active " data-toggle="tab" href="#activeTab">Select Billing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  " data-toggle="tab" href="#nameTab">New Billing</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div id="activeTab" class="tab-pane fade show active">
                                <div class="row">
                                    <div>
                                        <label for="billingID">Billing Number:</label>
                                        <input type="text" class="form-control" id="billingID" name="billingID" placeholder="Enter Billing Number" list="billingList" correctData="billingsData" autocomplete="off">
                                        <?php require_once('../API/datalist/billing-list.php') ?>
                                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                                            Please select a valid Billing
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div id="nameTab" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="name">Billing Number:</label>
                                        <input type="text" class="form-control text-light bg-secondary" id="name" placeholder="Enter Billing Number" readonly value="<?php echo "00" . ($LastBillingID + 1); ?>" autocomplete="off" value="">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="accountOf">Account of<span class="text-danger mx-1">*</span></label>
                                        <input type="text" correctData="patientsData" id="accountOf" name="accountOfID" class="form-select" placeholder="Account of" list="patientList">
                                        <?php require_once('../API/datalist/patient-list.php') ?>
                                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                                            Please select a valid account.
                                        </small>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <!-- Date Admitted -->
                                    <div class="col">
                                        <label class="form-label" for="dateAdmitted">Date Admitted<span class="text-danger mx-1">*</span></label>
                                        <input class="form-control" type="date" id="dateAdmitted" name="dateAdmitted">
                                    </div>
                                    <!-- Time Admitted -->
                                    <div class="col">
                                        <label class="form-label" for="timeAdmitted">Time Admitted<span class="text-danger mx-1">*</span></label>
                                        <input class="form-control" type="time" id="timeAdmitted" name="timeAdmitted">
                                    </div>
                                </div>
                                <!-- Attending Physician -->
                                <div class="my-3">
                                    <label class="form-label" for="attendingPhysician">Attending Physician<span class="text-danger mx-1">*</span></label>
                                    <input type="text" id="attendingPhysician" name="attendingPhysicianID" class="form-select" placeholder="Enter the Attending Physician" list="employeeList" correctData="employeesData">
                                    <?php require_once('../API/datalist/employee.php') ?>
                                    <small class="feedback d-none bg-danger p-1 rounded my-1">
                                        Please select a valid Physician.
                                    </small>
                                </div>
                                <!-- Admitting Physician -->
                                <div class="my-3">
                                    <label class="form-label" for="admittingPhysician">Admitting Physician<span class="text-danger mx-1">*</span></label>
                                    <input type="text" id="admittingPhysician" name="admittingPhysicianID" class="form-select" placeholder="Enter the Attending Physician" list="employeeList" correctData="employeesData">
                                    <?php require_once('../API/datalist/employee.php') ?>
                                    <small class="feedback d-none bg-danger p-1 rounded my-1">
                                        Please select a valid Physician.
                                    </small>
                                </div>
                                <div class="row my-3">
                                    <!-- Date Discharged -->
                                    <div class="col">
                                        <label class="form-label" for="dateDischarged">Date Discharged</label>
                                        <input class="form-control" type="date" id="dateDischarged" name="dateDischarged">
                                    </div>
                                    <!-- Time Discharged -->
                                    <div class="col">
                                        <label class="form-label" for="timeDischarged">Time Discharged</label>
                                        <input class="form-control" type="time" id="timeDischarged" name="timeDischarged">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requestedByName">Requested By: </label>
                        <input type="text" class="form-control is-invalid" name="requestedByName" list="employeeList" correctData="employeesData" placeholder="Enter Requested By Name" required>
                        <?php require_once('../API/datalist/employee.php') ?>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a valid requested by Name.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="enteredByName">Entered By: </label>
                        <input type="text" class="form-control is-valid text-light bg-secondary" name="enteredByName" list="employeeList" readonly correctData="employeesData" placeholder="Enter Entered By Name" value="<?= $currentLoggedInEncoder; ?>" sql-value="<?= $currentLoggedInEncoderID; ?>" required isvalidated="true">
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
            <h3 class="app-title mt-4 text-white">PRODUCT CART:</h3>
            <div class="table-responsive p-2">
                <table class="table table-bordered wide-table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col-3">Product Code</th>
                            <th class="col-1">Inventory</th>
                            <th class="col-1">Unit</th>
                            <th class="col-1">Price</th>
                            <th class="col-1">Item Type</th>
                            <th class="col-1" style="display:none">ID</th>
                            <th class="col-1" style="display:none">itemTypeID</th>
                            <th class="col-1">Quantity</th>
                            <th class="col-1">Discount %</th>
                            <th class="col-1">Discount Amount</th>
                            <th class="col-2">Sub-Total</th>
                            <th class="col-0">action</th>
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
    <script script src="./charge.js"></script>

    <script type="module">
        import {
            validateDataList
        } from "../costum-js/datalist.js";
        validateDataList({
            patientsData: JSON.parse('<?= $patientsData ?>'),
            employeesData: JSON.parse('<?= $employeesData ?>'),
            billingsData: JSON.parse('<?= $billingsData ?>'),
        });
    </script>
</body>

</html>