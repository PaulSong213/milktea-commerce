<html>
<div id="patientContainer" class="rounded p-3 my-2 text-left border border-white">
    <div class="row mb-1">
        <div class="col-6">
            <label for="hospitalRecordNo" class="form-label">Hospital #</label>
            <input type="text" placeholder="Enter Patient Hospital No." class="form-select border border-secondary" id="hospitalRecordNo" list="patientList" correctData="patientsData" required>
            <?php require_once('../API/datalist/patient-list.php') ?>
            <small id="patientRecordIndicator" class="text-success fw-bold d-none">PATIENT HAS PREVIOUS RECORD</small>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col">
            <label for="patientLastname" class="form-label">Last Name</label>
            <input type="text" placeholder="Enter Patient Last name" class="form-control border border-secondary" id="patientLastname" required>
        </div>
        <div class="col">
            <label for="patientFirstname" class="form-label">First Name</label>
            <input type="text" placeholder="Enter Patient First Name" class="form-control border border-secondary" id="patientFirstname" required>
        </div>

    </div>
    <div class="row mb-1">
        <div class="col">
            <label for="patientMiddlename" class="form-label">Middle Name</label>
            <input type="text" placeholder="Enter Patient Middle Name" class="form-control border border-secondary" id="patientMiddlename">
        </div>
        <div class="col">
            <label for="patientBdate" class="form-label">Birth Date</label>
            <input type="date" class="form-control border border-secondary" id="patientBdate">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col">
            <label for="patientAge" class="form-label">Age</label>
            <input type="text" placeholder="Enter Patient Age" class="form-control border border-secondary" id="patientAge">
        </div>
        <div class="col">
            <label for="patientGender" class="form-label">Sex</label>
            <select class="form-select" id="patientGender" name="patientGender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
</div>
<script type="module">
    import {
        extractID
    } from '/Zarate/costum-js/datalist.js';
    $(document).ready(function() {

        const patientsData = JSON.parse('<?php echo $patientsData; ?>');

        $("#hospitalRecordNo").on('input', function() {
            const recordVal = $(this).val();
            const hospitalRecordNo = extractID(recordVal);
            $("#patientContainer input").val('');
            $(this).val(hospitalRecordNo ? hospitalRecordNo : recordVal);
            if (!patientsData[hospitalRecordNo]) return;
            const currentPatient = patientsData[hospitalRecordNo].data;
            console.log(currentPatient);
            $("#patientLastname").val(currentPatient.lname);
            $("#patientFirstname").val(currentPatient.fname);
            $("#patientMiddlename").val(currentPatient.mname);
            $("#patientBdate").val(currentPatient.bDate);
            $("#patientAge").val(currentPatient.age);
            if (currentPatient.gender == "Female") $("#patientGender").val("Female").change();
        });
    });
</script>

</html>