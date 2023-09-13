<!DOCTYPE html>
<html>

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
            max-width: 90%;
            max-height: 1000px;
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
    <div class="container-fluid">
        <div class="container-fluid py-5 form-container">
            <h1>Medical Services Request Form</h1>
            <form method="post" action="process.php">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row text-left">
                            <h6>SERVICES: </h6>
                            <div class="col-md-4 col-sm-12" onclick="showRadioOptions('lab')">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="lab_radio" name="request_type" value="lab" class="custom-control-input">
                                    <label class="custom-control-label " for="lab_radio"><i class="material-icons">local_hospital</i> Laboratory</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12" onclick="showRadioOptions('ultrasound')">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ultrasound_radio" name="request_type" value="ultrasound" class="custom-control-input">
                                    <label class="custom-control-label" for="ultrasound_radio"><i class="material-icons">pregnant_woman</i> Ultrasound / Imaging</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12" onclick="showRadioOptions('xray')">
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
                            <textarea name="additional_info" id="additional_info" rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4 bg-light rounded">
                        <div class="form-group col-md-12">
                            <label for="services_table">Services List:</label>
                            <table id="services_table" class="table">
                                <thead>
                                    <tr>
                                        <th>Services List: </th>
                                    </tr>
                                </thead>
                                <tbody id="services_list_body" style="max-height: 200px; overflow: auto;"></tbody>
                            </table>
                        </div>
                        <input type="hidden" name="table_html" id="table_html" value="">
                    </div>
                </div>
                <div class=" form-group mt-5 text-left">
                    <button type="submit" class="btn btn-primary px-5" name="SaveItem"> Submit Request</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to show/hide the radio options based on the selected request type
        function showRadioOptions(requestType) {
            var labRequest = document.getElementById("lab_request");
            var ultrasoundRequest = document.getElementById("ultrasound_request");
            var xrayRequest = document.getElementById("xray_request");

            if (requestType === "lab") {
                labRequest.style.display = "block";
                ultrasoundRequest.style.display = "none";
                xrayRequest.style.display = "none";
            } else if (requestType === "ultrasound") {
                labRequest.style.display = "none";
                ultrasoundRequest.style.display = "block";
                xrayRequest.style.display = "none";
            } else if (requestType === "xray") {
                labRequest.style.display = "none";
                ultrasoundRequest.style.display = "none";
                xrayRequest.style.display = "block";
            }
        }

        function addToServiceList(inputFieldId, dataList) {
            const inputField = document.getElementById(inputFieldId);
            const inputText = inputField.value.trim();

            if (inputText) {
                // Create a new table row
                const newRow = document.createElement("tr");
                newRow.innerHTML = `<td>${inputText}</td>`;
                // Append the new row to the services list table
                const servicesListTableBody = document.getElementById("services_list_body");
                servicesListTableBody.appendChild(newRow);
                // Clear the input field
                inputField.value = "";
                return false;
            }

            return true;
        }

        // Add an event listener to the "Add to list" buttons
        document.getElementById("lab_add_to_list").addEventListener("click", function() {
            return addToServiceList("laboratory_input", "laboratorylist");
        });

        document.getElementById("ultrasound_add_to_list").addEventListener("click", function() {
            return addToServiceList("ultrasound_type", "ultrasoundlist");
        });

        document.getElementById("xray_add_to_list").addEventListener("click", function() {
            return addToServiceList("xray_body_part", "xraylist");
        });
    </script>
</body>

</html>