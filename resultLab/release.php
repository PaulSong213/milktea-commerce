<!DOCTYPE html>
<html>

<head>
    <title>RADIOLOGY REPORT</title>
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
            margin-top: 20px;
            margin-bottom: 30px;
        }

        h2 {
            margin-bottom: 30px;
            text-align: left;
            margin-left: 140px;
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
            max-height: 100%;
            /* Increase the max-width value */
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            margin-top: 3%;
            text-align: center;
            justify-content: center;
        }
        .lab-result-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto; /* Center horizontally */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center vertically */
            border: 1px solid #ccc; /* Add a border */
            border-radius: 10px;
            margin: 20px auto; /* Center horizontally */
            padding: 10px; /* Add padding */
            max-width: 70%; /* Adjust the width as needed */
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid py-1 form-container" style="background-color: #f0f0f0;">
            <h1>LABORATORY REPORT</h1>
            <form method="post" action="process_request.php"  >
                <div class="row">
                </div>
                <?php include('./components/patient-selection.php') ?>
                <div class="row">
                    <div class="form-group col-md-5 d-flex align-items-center justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input inputTypeRadio" type="radio" checked="checked" id="opdRadio"
                                name="patientAccountType" value="OPD" required>
                            <label class="form-check-label" for="opdRadio">OUT PATIENT DEPT. (WALKIN/CASH)</label>
                            <div class="invalid-feedback">Please select a patient type.</div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 d-flex align-items-center justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input inputTypeRadio" type="radio" id="ipdRadio" name="patientAccountType"
                                value="IPD" required>
                            <label class="form-check-label" for="ipdRadio">IN PATIENT DEPT. (ADMISSION)</label>
                            <div class="invalid-feedback">Please select a patient type.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 text-left">
                        <label for="doctor_name">Requested By Name:</label>
                        <input type="text" name="doctor_name" id="doctor_name" class="form-control" list="employeeList"
                            placeholder="Enter Requested by Name">
                        <?php require_once('../API/datalist/employee.php') ?>
                    </div>
                    <div class="form-group col-md-6 text-left">
                        <label for="doctor_name">Requested By Name:</label>
                        <input type="text" name="doctor_name" id="doctor_name" class="form-control" list="employeeList"
                            placeholder="Enter Requested by Name">
                        <?php require_once('../API/datalist/employee.php') ?>
                    </div>  
                </div>
                <h2>Results:</h2>
                <div class="lab-result-container">
                    <div class="row text-center justify-content-center" style="max-width:90%;">
                    <div class="col-md-6">
                        <div class="row">   
                        <div class="col-md-6">
                            <div class="form-group text-right" style="margin-bottom: 10px;">
                            <label for="column1" style="font-size: 15px; font-weight: bold; text-transform: uppercase; margin-bottom: 50px;">Macroscopic</label>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Color:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Transparency</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Reaction(pH):</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Protein:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Sugar:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Specific Gravity:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Ketone</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Pregnancy Test</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Others:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label for="column1" style="font-size: 15px; font-weight: bold; text-transform: uppercase; margin-bottom: 40px;"></label>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text1"></label>
                                <input type="text" name="text1" id="text1" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text2"></label>
                                <input type="text" name="text2" id="text2" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text3"></label>
                                <input type="text" name="text3" id="text3" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">   
                        <div class="col-md-6">
                            <div class="form-group text-right" style="margin-bottom: 10px;">
                            <label for="column1" style="font-size: 15px; font-weight: bold; text-transform: uppercase; margin-bottom: 50px;">Microscopic</label>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Pus cells/HPF:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">RBC/HPF:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Epithelial Cells:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 20px;">
                                    <label for="column1" style="font-size: 16px;">Mucus Threads:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Amorpheus Urates/Phosphates:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Yeast cells:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Bacteria:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Cast:</label>
                                </div>
                                <div class="form-group text-left" style="margin-bottom: 40px;">
                                    <label for="column1" style="font-size: 16px;">Crystals:</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="column1" style="font-size: 15px; font-weight: bold; text-transform: uppercase; margin-bottom: 40px;"></label>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text1"></label>
                                <input type="text" name="text1" id="text1" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text2"></label>
                                <input type="text" name="text2" id="text2" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text3"></label>
                                <input type="text" name="text3" id="text3" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                            <div class="form-group text-left" style="margin-bottom: 10px;">
                                <label for="text4"></label>
                                <input type="text" name="text4" id="text4" class="form-control" placeholder="">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>

</html>
