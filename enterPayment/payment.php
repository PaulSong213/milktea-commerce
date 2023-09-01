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

?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        #parent {
            background-color: <?= isset($_GET['type']) && $_GET['type'] === 'bill' ? "#262626" : "#000e1a" ?>;
        }
    </style>
</head>

<body class="fluid" id="parent">
    <form method="POST" action="databasefunctions.php" id="addItemForm" class="container-fluid p-3" autocomplete="off">
        <div class="row text-white mb-4">
            <h3 class="text-uppercase my-4 text">
                ENTER PAYMENT | <?= $_GET['type'] ?>
            </h3>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="receivedByID">Received By</label>
                        <input type="text" class="form-control is-valid" name="receivedByID" id="receivedByID" list="employeeList" readonly correctData="employeesData" placeholder="Enter Entered By Name" value="<?= $currentLoggedInEncoder; ?>" sql-value="<?= $currentLoggedInEncoderID; ?>" required isvalidated="true">
                        <?php require_once('../API/datalist/employee.php') ?>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a valid requested by Name.
                        </small>
                    </div>

                    <div class="form-group row mt-3 pe-3">
                        <label class="form-label">Mode of Payment</label>
                        <div class="col radio-btn btn btn-dark ms-3">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="radio" checked="checked" id="cashRadio" name="modeOfPayment" value="cash" required />
                                <label class="form-check-label h-full d-flex align-items-center" for="cashRadio">
                                    <i class="material-icons d-inline mx-2">attach_money</i>CASH</label>
                            </div>
                        </div>
                        <div class="col radio-btn btn text-white border border-secondary ms-3">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="radio" id="checkRadio" name="modeOfPayment" value="check" required />
                                <label class="form-check-label h-full d-flex align-items-center" for="checkRadio">
                                    <i class="material-icons d-inline mx-2">credit_card</i>CHECK</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Date Paid -->
                        <div class="col">
                            <label class="form-label" for="datePaid">Date Paid</label>
                            <input class="form-control" type="date" id="datePaid" name="datePaid">
                        </div>
                        <!-- Time Paid -->
                        <div class="col">
                            <label class="form-label" for="timePaid">Time Paid</label>
                            <input class="form-control" type="time" id="timePaid" name="timePaid">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="chargeID">Charge Slip</label>
                        <input type="text" class="form-select" name="chargeID" id="chargeID" list="chargeList" correctData="chargeData" placeholder="Enter Charge Slip" required>
                        <?php require_once('../API/datalist/charge.php') ?>
                        <small class="feedback d-none bg-danger p-1 rounded my-1">
                            Please select a valid Charge No.
                        </small>
                    </div>

                    <button id="submitPayment" class="btn btn-success col text-uppercase fw-bold fs-5" type="submit">
                        Enter Payment
                    </button>

                </div>
                <div class="col-12 col-lg-6">

                    <?php
                    require_once('./modeOfPayment/cash.php');
                    require_once('./modeOfPayment/check.php');
                    ?>

                    <div id="chargeInfoParent" class="p-3 rounded d-none" style="background-color: #002240;">

                        <!-- Charge to -->
                        <div class="mb-3">
                            <label class="form-label" for="chargedTo">Charged to</label>
                            <input readonly type="text" id="chargedTo" name="chargedTo" class="form-control-plaintext text-white fw-bold fs-6 border border-white rounded px-2" value="Test">
                        </div>

                        <!-- Bill Total -->
                        <div class="mb-3">
                            <label class="form-label" for="billTotal">Bill Total</label>
                            <input readonly type="text" id="billTotal" name="billTotal" class="form-control-plaintext text-white fw-bold fs-6 border border-white rounded px-2">
                        </div>

                        <!-- Remaning Balance -->
                        <div class="mb-3">
                            <label class="form-label" for="remainingBalance">Remaining Balance</label>
                            <input readonly type="text" id="remainingBalance" name="remainingBalance" class="form-control-plaintext text-danger  fw-bold fs-6 border border-white rounded px-2">
                        </div>

                        <!-- Amount Paid -->
                        <div class="mt-3 mb-3">
                            <label class="form-label" for="amountPaid">Amount Paid</label>
                            <input readonly type="text" id="amountPaid" name="amountPaid" class="form-control-plaintext text-white fw-bold fs-6 border border-white rounded px-2">
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </form>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="module">
    import {
        validateDataList
    } from "../costum-js/datalist.js";
    validateDataList({
        employeesData: JSON.parse('<?= $employeesData ?>'),
        chargeData: JSON.parse('<?= $chargeData ?>'),
    });
</script>
<script>
    $(document).ready(function() {
        // set default value of date and time admitted to current date and time
        const now = new Date();
        const formattedDate = now.toISOString().substr(0, 10);
        const formattedTime = `${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
        $("#datePaid").val(formattedDate);
        $("#timePaid").val(formattedTime);

        $(".radio-btn").click(function() {
            $(".radio-btn").removeClass("btn-dark").addClass("border border-secondary text-white");
            $(this).removeClass("border border-secondary text-white").addClass("btn-dark");
            const radioInput = $(this).find("input");
            radioInput.prop("checked", true);
            if (radioInput.val() === "cash") {
                $(".check-form").addClass("d-none");
                $(".cash-form").removeClass("d-none");
            } else {
                $(".cash-form").addClass("d-none");
                $(".check-form").removeClass("d-none");
            }
        });

        $("#chargeID").change(function() {
            const chargeID = $(this).attr('sql-value');
            if (!chargeID) {
                $("#chargeInfoParent").addClass("d-none");
                return;
            };
            const chargeData = JSON.parse('<?= $chargeData ?>');
            const charge = chargeData[chargeID].data;
            console.log(charge);
            $("#chargedTo").val(`${charge.fname} ${charge.mname} ${charge.lname}`);
            $("#billTotal").val(`${charge.NetAmt}`);
            $("#remainingBalance").val(`${charge.remainingBalance}`);
            $("#amountPaid").val(charge.AmtTendered);
            $("#chargeInfoParent").removeClass("d-none");

            $("#ammountTendered").trigger("change");
        });

        $("#submitPayment").click(function(event) {
            // Filter out hidden required inputs
            var emptyVisibleRequiredInputs = $("input[required]:visible").filter(function() {
                return !$(this).val();
            });
            // Check if there are any visible required inputs
            if (emptyVisibleRequiredInputs.length === 0) {
                // All visible required inputs are filled out
                // Now you can manually submit the form
                console.log('submitting form');
                $("#addItemForm").submit();
            }
        });

    });
</script>



</html>