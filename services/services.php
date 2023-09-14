<!DOCTYPE html>
<html>
<?php
$loggedInUser = isset($_SESSION['user']) ? json_decode($_SESSION['user']) : null;
$currentLoggedInEncoder = $loggedInUser->title . ' ' . $loggedInUser->lname . ',' . $loggedInUser->fname . ' ' . $loggedInUser->mname . ' | ID: ' . $loggedInUser->DatabaseID;
$currentLoggedInEncoderID = $loggedInUser->DatabaseID;

?>

<head>
    <title>Medical Request Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Add custom CSS styles here */
        body {
            color: #ffffff;
        }

        h1 {
            margin-bottom: 30px;
        }

        .request-type-label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .custom-control-label {
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        input[type="text"] {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000000;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        .btn-primary {
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;

        }

        .btn-primary:hover {
            background-color: #cccccc;
        }

        .form-container {
            max-width: 100%;
            max-height: 100%;
            /* Increase the max-width value */
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            margin-top: 3%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="container-fluid py-5 form-container">
            <h1>Medical Services Request Form</h1>
            <form method="post" action="process.php">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row text-left">
                            <h6>SERVICES: </h6>
                            <div class="col-md-4 col-sm-12" id="labradio" onclick="showRadioOptions('lab')">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="lab_radio" name="request_type" value="lab" class="custom-control-input">
                                    <label class="custom-control-label " for="lab_radio"><i class="material-icons">local_hospital</i> Laboratory</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12" id="ultrasoundradio" onclick="showRadioOptions('ultrasound')">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ultrasound_radio" name="request_type" value="ultrasound" class="custom-control-input">
                                    <label class="custom-control-label" for="ultrasound_radio"><i class="material-icons">pregnant_woman</i> Ultrasound / Imaging</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12" id="xrayradio" onclick="showRadioOptions('xray')">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="xray_radio" name="request_type" value="xray" class="custom-control-input">
                                    <label class="custom-control-label" for="xray_radio"><i class="material-icons">medical_services</i> X-ray</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-left" style="margin-top:30px;">
                            <div id="lab_request" style="display: none;" class="form-group">
                                <label for="laboratory_input">Laboratory Test:</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="laboratory_input" id="laboratory_input" list="laboratorylist" placeholder="Enter the services available">
                                        <?php require_once('../API/datalist/laboratory.php') ?>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" id="lab_add_to_list">Add to list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div></div>
                        <div class="form-group text-left">
                            <div id="ultrasound_request" style="display: none;" class="form-group">
                                <label for="ultrasound_type">Ultrasound Type:</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="ultrasound_type" id="ultrasound_type" list="ultrasoundlist" placeholder="Enter the services available">
                                        <?php require_once('../API/datalist/ultrasound.php') ?>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" id="ultrasound_add_to_list">Add to list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <div id="xray_request" style="display: none;" class="form-group">
                                <label for="xray_body_part">X-ray Body Part:</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="xray_body_part" id="xray_body_part" list="xraylist" placeholder="Enter the services available">
                                        <?php require_once('../API/datalist/xray.php') ?>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" id="xray_add_to_list">Add to list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="EnteredBy" id="EnteredBy" value="<?= $currentLoggedInEncoder; ?>" sql-value="<?= $currentLoggedInEncoderID; ?>">
                        <input type="hidden" name="department" id="department">
                        <div class="form-group text-left">
                            <label for="patient_name">C/C or Reason:</label>
                            <input type="text" name="reason" id="reason"  class="form-control" placeholder="Enter charge List Number ">
                        </div>
                        <div class="form-group text-left">
                            <label for="patient_name">Charge List Number:</label>
                            <input type="text" name="ChargeNo" id="ChargeNo" list="chargeNoList" class="form-control" placeholder="Enter charge List Number ">
                            <?php require_once('../API/datalist/chargeNo.php') ?>
                        </div>
                        <div class="form-group text-left">
                            <label for="patient_name">Patient Name:</label>
                            <input type="text" name="patient_name" id="patient_name" list="patientList" class="form-control" placeholder="Enter Patient Name ">
                            <?php require_once('../API/datalist/patient-list.php') ?>
                        </div>
                        <div class="form-group text-left">
                            <label for="doctor_name">Requested By Name:</label>
                            <input type="text" name="doctor_name" id="doctor_name" class="form-control" list="employeeList" placeholder="Enter Requested by Name ">
                            <?php require_once('../API/datalist/employee.php') ?>
                        </div>
                        <div class="form-group text-left">
                            <label for="additional_info">Remarks/Special Instructions:</label>
                            <textarea name="additional_info" id="additional_info" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-left" id="Chief_Complaint">
                            <label for="Chief_Complaint">Chief Complaint:</label>
                            <textarea name="Chief_Complaint" id="Chief_Complaint" rows="1" class="form-control"></textarea>
                        </div>
                        <div class="form-group text-left" id="Working_DX">
                            <label for="Working_DX">Working DX:</label>
                            <textarea name="Working_DX" id="Working_DX" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4 bg-light rounded">
                        <div class="form-group col-md-12">
                            <label for="services_table">Services List:</label>
                            <table id="services_table" name="services_table" class="table">
                                <thead>
                                    <tr>
                                        <th>Services List: </th>
                                    </tr>
                                </thead>
                                <tbody id="services_list_body" style="max-height: 200px; overflow: auto;">
                                    <tr>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group text-left">
                    <button type="submit" class="btn btn-primary px-5" name="SaveItem" id="submit_button" onclick="collectAndSendDataToServer()">Submit Request</button>
                    <input type="hidden" name="table" id="table">
                </div>
            </form>
        </div>
    </div>
    <script>
        // Get DOM elements
        var labRequest = document.getElementById("lab_request");
        var ultrasoundRequest = document.getElementById("ultrasound_request");
        var xrayRequest = document.getElementById("xray_request");
        var department = document.getElementById("department");
        var Chief_Complaint = document.getElementById("Chief_Complaint");
        var Working_DX = document.getElementById("Working_DX");
        var table = document.getElementById("services_table");
        var tbody = document.getElementById("services_list_body");
        var rows = tbody.getElementsByTagName("tr");
        var labradio = document.getElementById("labradio");
        var ultrasoundradio = document.getElementById("ultrasoundradio");
        var xrayradio = document.getElementById("xrayradio");


        // Hide unnecessary elements by default
        Working_DX.style.display = "none";
        Chief_Complaint.style.display = "none";

        // Function to show/hide the radio options based on the selected request type
        function showRadioOptions(requestType) {
            labRequest.style.display = requestType === "lab" ? "block" : "none";
            ultrasoundRequest.style.display = requestType === "ultrasound" ? "block" : "none";
            xrayRequest.style.display = requestType === "xray" ? "block" : "none";

            // Set department values based on request type
            // Set the 'value' property based on the request type
            department.value = requestType === "lab" ? "5" : requestType === "ultrasound" ? "6" : "7";

            // Show/hide additional fields
            Working_DX.style.display = requestType === "xray" ? "block" : "none";
            Chief_Complaint.style.display = requestType === "xray" ? "block" : "none";
        }

        // Function to add a service to the table
        function addToServiceList(inputFieldId) {
            const inputField = document.getElementById(inputFieldId);
            const inputText = inputField.value.trim();
            // Check if the input text is not null and not an empty string before inserting a new row
            if (inputText !== null && inputText !== "") {
                const newRow = tbody.insertRow(-1);
                const cell = newRow.insertCell(0);
                cell.innerHTML = inputText;
                inputField.value = "";

            }

        }

        // Event listeners for adding services to the list
        document.getElementById("lab_add_to_list").addEventListener("click", function() {
            ultrasoundradio.style.display = "none";
            xrayradio.style.display = "none";

            addToServiceList("laboratory_input");
            collectAndSendDataToServer();
        });

        document.getElementById("ultrasound_add_to_list").addEventListener("click", function() {
            addToServiceList("ultrasound_type");
            labradio.style.display = "none";
            xrayradio.style.display = "none";
            collectAndSendDataToServer();
        });

        document.getElementById("xray_add_to_list").addEventListener("click", function() {
            addToServiceList("xray_body_part");
            labradio.style.display = "none";
            ultrasoundradio.style.display = "none";
            collectAndSendDataToServer();
        });

        // Function to display table value
        function collectAndSendDataToServer() {
            var rows = document.querySelectorAll("table tr"); // Select all table rows
            var data = []; // Create an empty array to store the data

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                if (cells.length > 0) {
                    var rowData = [];
                    for (var j = 0; j < cells.length; j++) {
                        rowData.push(cells[j].textContent.trim());
                    }
                    data.push(rowData); // Add the row data to the array
                }
            }

            // Remove null rows from the data array
            data = data.filter(function(row) {
                return row.length > 0;
            });

            // Convert the data array to a JSON string
            var jsonData = JSON.stringify(data);
            console.log(jsonData);
            // Set the value of the hidden input field to the JSON string
            document.getElementById("table").value = jsonData;
            console.log(document.getElementById("table").value);
        }
    </script>

</body>

</html>