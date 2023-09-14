<!DOCTYPE html>
<html>

<head>
    <title>Medical Release Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../result/release.js"></script>
    <!-- Include Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Add custom CSS styles here */
        body {
            background: #2F4F4F;
        }
        
        h1 {
            margin-bottom: 30px;
        }

        h2 {
            margin-bottom: 30px;
            text-align: left;
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
        <div class="container-fluid py-5 form-container" style="background-color: #f0f0f0;">
            <h1>Medical Services Release Form</h1>
            <form method="post" action="process_request.php">
            <div class="row">
                <?php include('./components/patient-selection.php') ?>
            </div>
            <div class="row">
                <div class="form-group col-md-5 d-flex align-items-center justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input inputTypeRadio" type="radio" checked="checked" id="opdRadio" name="patientAccountType" value="OPD" required>
                        <label class="form-check-label" for="opdRadio">OUT PATIENT DEPT. (WALKIN/CASH)</label>
                        <div class="invalid-feedback">Please select a patient type.</div>
                    </div>
                </div>
                <div class="form-group col-md-5 d-flex align-items-center justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input inputTypeRadio" type="radio" id="ipdRadio" name="patientAccountType" value="IPD" required>
                        <label class="form-check-label" for="ipdRadio">IN PATIENT DEPT. (ADMISSION)</label>
                        <div class="invalid-feedback">Please select a patient type.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 text-left">
                    <label for="doctor_name">Requested By Name:</label>
                    <input type="text" name="doctor_name" id="doctor_name" class="form-control" list="employeeList" placeholder="Enter Requested by Name">
                    <?php require_once('../API/datalist/employee.php') ?>
                </div>
                <div class="form-group col-md-6 text-left">
                    <label for="room">Room:</label>
                    <input type="text" name="room" id="room" class="form-control" list="roomList" placeholder="Enter Room">
                
                </div>
            </div>


                    <h2>Results:</h2>
                    <div class="row">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label for="column1">Column 1:</label>
                                            <input type="text" name="column1" id="column1" class="form-control"
                                                placeholder="Enter content for Column 1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label for="column2">Column 2:</label>
                                            <input type="text" name="column2" id="column2" class="form-control"
                                                placeholder="Enter content for Column 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label for="column3">Column 3:</label>
                                            <input type="text" name="column3" id="column3" class="form-control"
                                                placeholder="Enter content for Column 3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-left">
                                            <label for="column4">Column 4:</label>
                                            <input type="text" name="column4" id="column4" class="form-control"
                                                placeholder="Enter content for Column 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>