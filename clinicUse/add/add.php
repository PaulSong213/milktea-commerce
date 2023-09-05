<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggested Input Text</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form method="POST" action="./add/addfunction.php" autocomplete="on" id="addItemForm">
        <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Patient Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <b><label class="form-label" for="lname">Patient Information<span class="text-danger mx-1"></span></label></b>
                        <!-- Your modal content goes here -->
                        <!-- LastName -->
                        <div class="mb-3">
                            <label class="form-label" for="lname">Last Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name" autocomplete="on"  >
                        </div>
                        <!-- FirstName -->
                        <div class="mb-3">
                            <label class="form-label" for="fname">First Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter First Name" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mname">Middle Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="mname" name="mname" class="form-control" placeholder="Enter Middle Name" autocomplete="on"  >
                        </div>

                        <div class="mb-3">
                            </select>
                            <label for="type">Gender : </label>
                            <select class="form-select" id="type" name="gender">
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="age">Age<span class="text-danger mx-1"></span>*</label>
                            <input type="number" id="age" name="age" class="form-control" placeholder="Enter Age" autocomplete="on"  >
                        </div>
                        <b><label class="form-label">Personal Details<span class="text-danger mx-1">*</span></label></b>
                        <div class="mb-3">
                            <label class="form-label" for="add">Residential Address<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="add" name="add" class="form-control" placeholder="Enter Residential" autocomplete="on"  >
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bdate">Date of Birth<span class="text-danger mx-1">*</span></label>
                            <input type="date" id="bdate" name="bdate" class="form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phoneHome">Phone No.(Home)</label>
                            <input type="number" id="phoneHome" name="phoneHome" placeholder="Enter Phone No. (Home)" class="form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phoneWork">Phone No.(Work)</label>
                            <input type="number" id="phoneWork" name="phoneWork" placeholder="Enter Phone No. (Work)" class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phoneCell">Cellphone</label>
                            <input type="number" id="phoneCell" name="phoneCell" placeholder="Enter Phone No. (Cellphone)" class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" autocomplete=" on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="occupation">Occupation</label>
                            <input type="text" id="occupation" name="occupation" placeholder="Enter Occupation" class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="employerName">Employer's Name</label>
                            <input type="text" id="employerName" name="employerName" placeholder="Enter Employer Name" class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="employerNo">Employer's Contact No.</label>
                            <input type="text" id="employerNo" name="employerNo" placeholder="Enter Contact No." class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="workAddress">Work Address</label>
                            <textarea type="text" id="workAddress" name="workAddress" placeholder="Enter Work Address" class="form-control" autocomplete="on"  ></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nationality">Nationality<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="nationality" name="nationality" placeholder="Nationality" class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="religion">Religion<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="religion" name="religion" placeholder="Religion" class=" form-control" autocomplete="on"  >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="SpouseName">Name of Spouse(if Applicable)</label>
                            <input type="text" id="SpouseName" name="SpouseName" placeholder="Enter Spouse Name " class=" form-control" autocomplete="on">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="spousecontactNo">Contact No.(Spouse)</label>
                            <input type="number" id="spousecontactNo" name="spousecontactNo" class="form-control" placeholder="Enter Phone No." autocomplete=" on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="MotherName">Name of Mother</label>
                            <input type="text" id="MotherName" name="MotherName" class="form-control" placeholder="Enter Mother Name" autocomplete=" on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mothercontactNo">Contact No.(Mother)</label>
                            <input type="number" id="mothercontactNo" name="mothercontactNo" placeholder="Enter Phone No." class=" form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="FatherName">Name of Father</label>
                            <input type="text" id="FatherName" name="FatherName" class="form-control" placeholder="Enter Father Name " autocomplete=" on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="fathercontactNo">Contact No.(Father)</label>
                            <input type="number" id="fathercontactNo" name="fathercontactNo" class="form-control" placeholder="Enter Phone No." autocomplete=" on">
                        </div>
                        <div class="mb-3">
                            </select>
                            <label for="marital">Marital Status : </label>
                            <select class="form-select" id="marital" name="marital">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <b><label for="description">Health Coverage</label></b>

                        <div class="mb-3">
                            </select>
                            <label for="philHealth">PhilHealth Member: </label>
                            <select class="form-select" id="philHealth" name="philHealth">
                                <option value="NH">NH</option>
                                <option value="NN">NN</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" id="phPinlabel" for="phPin">Phil Health No. (PIN)</label>
                            <input type="text" id="phPin" name="phPin" class="form-control" placeholder="Enter PhilHealth No.(PIN)" autocomplete=" on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="HMO">HMO</label>
                            <input type="text" id="HMO" name="HMO" class="form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="typeHMO">Type of HMO Coverage</label>
                            <input type="text" id="typeHMO" name="typeHMO" class="form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="certNo">Cert No.</label>
                            <input type="text" id="certNo" name="certNo" class="form-control" autocomplete="on">
                        </div>
                        <b><label class="form-label">Emergency Contact Person<span class="text-danger mx-1"></span></label></b>
                        <div class="mb-3">
                            <label class="form-label" for="emergencyName">Name</label>
                            <input type="text" id="emergencyname" name="emergencyname" placeholder="Enter Name of Emergency Contact Person" class=" form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="emergencyRelation">Relationship</label>
                            <input type="text" id="emergencyRelation" name="emergencyRelation" placeholder="Enter Relationship to the patients" class=" form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="emergencyAddress">Address</label>
                            <textarea type="text" id="emergencyAddress" name="emergencyAddress" placeholder="Address" class="form-control" autocomplete="on"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="emergencyphoneHome">Phone No. (Home)</label>
                            <input type="number" id="emergencyphoneHome" name="emergencyphoneHome" class="form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="emergencyphoneWork">Phone No. (Work)</label>
                            <input type="number" id="emergencyphoneWork" name="emergencyphoneWork" class="form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="emergencyCphone">Phone No. (Cellphone)</label>
                            <input type="number" id="emergencyCphone" name="emergencyCphone" class="form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="allergies">Allergies</label>
                            <input type="text" id="allergies" name="allergies" class="form-control" autocomplete="on">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="surgicalHistory">Pertinent Past Medical/ Surgical History</label>
                            <textarea type="text" id="surgicalHistory" name="surgicalHistory" class="form-control" autocomplete="on"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="activeDiagnosis">Active Diagnosis</label>
                            <textarea id="activeDiagnosis" name="activeDiagnosis" class="form-control" autocomplete="on"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="activeMeds">Active Medication</label>
                            <textarea class="form-control" id="activeMeds" name="activeMeds" placeholder="Enter description" autocomplete="on"></textarea>
                        </div>

                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="SaveItem">Save
                            Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>


<script>
    $(document).ready(function() {
        // Get a reference to the select input element
        var philHealthSelect = $("#philHealth");

        // Get a reference to the input field
        var phPinInput = $("#phPin");
        var phPinlabel = $("#phPinlabel");

        // Attach an event handler to the select input
        philHealthSelect.on("change", function() {
            // Check the selected value
            if (philHealthSelect.val() === "NN") {
                // Hide the input field
                phPinInput.hide();
                phPinlabel.hide();
            } else {
                // Show the input field
                phPinInput.show();
                phPinlabel.show();
            }
        });
    });
</script>