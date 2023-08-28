<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="min-vh-100" style="background-color: #444465;">
        <form method="POST" id="createBillingForm" action="../API/billing-new-admission/create.php" class="container-fluid p-3" autocomplete="off">
            <div class="row text-white mb-4">
                <div class="row">
                    <div class="col-12 col-lg-6">

                        <h3 class="app-title mt-4 text">BILLING DATABASE</h3>

                        <!-- Entered by -->
                        <div class="my-3">
                            <label class="form-label" for="enteredBy">Entered by<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="enteredBy" name="encoderID" class="form-select " placeholder="Enter the encoder" required list="employeeList" correctData="employeesData">
                            <?php require_once('../API/datalist/employee-list.php') ?>
                            <small class="feedback d-none bg-danger p-1 rounded my-1">
                                Please select a valid encoder.
                            </small>
                        </div>

                        <!-- Patient -->
                        <div class="my-3">
                            <label class="form-label" for="patient">Patient<span class="text-danger mx-1">*</span></label>
                            <input type="text" correctData="patientsData" id="patient" name="patientID" class="form-select" placeholder="Enter the patient" required list="patientList">
                            <small class="feedback d-none bg-danger p-1 rounded my-1">
                                Please select a valid patient.
                            </small>
                            <?php require_once('../API/datalist/patient-list.php') ?>
                        </div>

                        <!-- Account of -->
                        <div class="my-3">
                            <label class="form-label" for="accountOf">Account of<span class="text-danger mx-1">*</span></label>
                            <input type="text" correctData="patientsData" id="accountOf" name="accountOfID" class="form-select" placeholder="Account of" required list="patientList">
                            <?php require_once('../API/datalist/patient-list.php') ?>
                            <small class="feedback d-none bg-danger p-1 rounded my-1">
                                Please select a valid account.
                            </small>
                        </div>

                        <div class="row my-3">
                            <!-- Date Admitted -->
                            <div class="col">
                                <label class="form-label" for="dateAdmitted">Date Admitted<span class="text-danger mx-1">*</span></label>
                                <input class="form-control" type="date" id="dateAdmitted" name="dateAdmitted" required>
                            </div>
                            <!-- Time Admitted -->
                            <div class="col">
                                <label class="form-label" for="timeAdmitted">Time Admitted<span class="text-danger mx-1">*</span></label>
                                <input class="form-control" type="time" id="timeAdmitted" name="timeAdmitted" required>
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="my-3">
                            <label class="form-label" for="type">Type<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="type" name="type">
                                <option value="Out Patient Dept.">In Patient Dept.</option>
                                <option value="Out Patient Dept.">Out Patient Dept.</option>
                            </select>
                        </div>

                        <!-- Attending Physician -->
                        <div class="my-3">
                            <label class="form-label" for="attendingPhysician">Attending Physician<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="attendingPhysician" name="attendingPhysicianID" class="form-select" placeholder="Enter the Attending Physician" required list="employeeList" correctData="employeesData">
                            <?php require_once('../API/datalist/employee-list.php') ?>
                            <small class="feedback d-none bg-danger p-1 rounded my-1">
                                Please select a valid Physician.
                            </small>
                        </div>

                        <!-- Admitting Physician -->
                        <div class="my-3">
                            <label class="form-label" for="admittingPhysician">Admitting Physician<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="admittingPhysician" name="admittingPhysicianID" class="form-select" placeholder="Enter the Attending Physician" required list="employeeList" correctData="employeesData">
                            <?php require_once('../API/datalist/employee-list.php') ?>
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
                    <div class="col-12 col-lg-6 py-4">
                        <div class="bg-danger rounded-md p-3 rounded">
                            <!-- Overall Account Balance -->
                            <div class="mb-3">
                                <label class="form-label h5" for="overallAccountBalance">Overall Account Balance</label>
                                <input readonly type="number" id="overallAccountBalance" name="overallAccountBalance" class="form-control-plaintext text-white fw-bold fs-3 border border-white rounded px-2" value="0">
                            </div>
                            <div>
                                <label class="form-label h5" for="billBalance">Bill Balance</label>
                                <input readonly type="number" id="billBalance" name="billBalance" class="form-control-plaintext text-white fw-bold fs-3 border border-white rounded px-2" value="0">
                            </div>
                        </div>
                        <div class="rounded-md rounded my-3 p-3 d-none" style="background-color: #7a5b99;" id="viewPatientContainer">
                            <!-- Patient Information Preview -->
                        </div>
                    </div>
                    <button class="btn btn-success w-100 mx-auto my-3" style="max-width: 75%;" type="submit">
                        CREATE BILLING
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        const correctDataReference = {
            patientsData: JSON.parse('<?= $patientsData ?>'),
            employeesData: JSON.parse('<?= $employeesData ?>')
        }

        // on submit form validate
        $("#createBillingForm").submit(function(e) {
            let isAllValidated = true;
            $('input[correctData]').each(function() {
                var isValidated = $(this).attr('isValidated');
                if (isValidated !== "true") {
                    console.log($(this));
                    e.preventDefault();
                    Swal.fire(
                        'Please correct the errors before submitting the form.',
                        '',
                        'error'
                    );
                    e.preventDefault();
                    isAllValidated = false;
                }
            });
            if (!isAllValidated) return;
            $('input[correctData]').each(function() {
                $(this).val($(this).attr('sql-value'));
            });
        });

        // patient on change event
        $('#patient').change(function() {
            const patientInfo = $(this).val();
            if ($("#accountOf").val() === "") {
                $("#accountOf").val(patientInfo).trigger("change");;
            }

            // console.log(correctDataReference.patientsData);
        });

        // attendingPhysician on change event
        $('#attendingPhysician').change(function() {
            const attendingPhysicianInfo = $(this).val();
            if ($("#admittingPhysician").val() === "") {
                $("#admittingPhysician").val(attendingPhysicianInfo).trigger("change");
            }
        });

        // correct data of input
        $('input[correctData]').change(function() {
            var correctDataValue = $(this).attr('correctData'); // Get the correctData attribute value
            var inputValue = $(this).val(); // Get the input value
            var id = extractID(inputValue);
            const correctDataObject = correctDataReference[correctDataValue]; // Get the correct data object
            if (!correctDataObject[id]) {
                $(this).addClass('border-danger');
                $(this).siblings('.feedback').removeClass("d-none");
                $(this).attr('sql-value', "");
                $(this).attr('isValidated', "false");
                return;
            } else {
                $(this).removeClass('border-danger');
                $(this).siblings('.feedback').addClass("d-none");
                $(this).attr('sql-value', id);
                $(this).attr('isValidated', "true");
            }

            if ($(this).attr('id') === "patient") {
                $("#viewPatientContainer").html(""); // Clear the patient information preview
                $("#viewPatientContainer").removeClass("d-none"); // Show the patient information preview
                const patientData = correctDataObject[id].data; // Get the patient data
                const viewDatas = [{
                    dataKey: "fname",
                    label: "First Name"
                }, {
                    dataKey: "mname",
                    label: "Middle Name"
                }, {
                    dataKey: "lname",
                    label: "Last Name"
                }, {
                    dataKey: "age",
                    label: "Age"
                }, {
                    dataKey: "maritalStatus",
                    label: "Marital Status"
                }, {
                    dataKey: "bDate",
                    label: "Birth Date"
                }, {
                    dataKey: "address",
                    label: "Address"
                }, ];
                console.log(patientData);
                for (let i = 0; i < viewDatas.length; i++) {
                    const data = viewDatas[i];
                    $("#viewPatientContainer").append(
                        `<div class="d-flex" id="accountInformation">
                            <p class="fw-bold" style="width: 200px;">${data.label}</p>
                            <p>${patientData[data.dataKey]}</p>
                        </div>`
                    );
                }
            }
        });

        // set default value of date and time admitted
        var now = new Date();
        var year = now.getFullYear();
        var month = String(now.getMonth() + 1).padStart(2, '0');
        var day = String(now.getDate()).padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;
        var hours = String(now.getHours()).padStart(2, '0');
        var minutes = String(now.getMinutes()).padStart(2, '0');
        var formattedTime = hours + ':' + minutes;
        $("#dateAdmitted").val(formattedDate);
        $("#timeAdmitted").val(formattedTime);

        $("#dateAdmittedInput").on("input", function() {
            var input = $(this).val();
            var options = $("#dateOptions").find("option").map(function() {
                return $(this).val();
            }).get();

            if (options.indexOf(input) === -1) {
                $(this).val("");
            }
        });

    });

    function extractID(inputString) {
        if (!inputString) return ""; // If the inputString is null, return null (no ID
        if (inputString.indexOf("|") === -1) return ""; // If the inputString does not contain "|", return null (no ID
        var idPart = inputString.split("|")[1].trim(); // Get the part after "|", then trim any leading/trailing spaces
        var id = idPart.split(":")[1].trim(); // Get the ID value after ":"
        return id;
    }
</script>

</html>