<html>
<div class="form-group text-left">
    <label for="patientAccountName">Patient Account Code</label>
    <div class="input-group">
        <input type="text" class="form-control is-invalid" name="patientAccountName" list="patientList" correctData="patientsData" placeholder="Enter Patient Account Name" required id="patientAccountName">
        <?php require_once('../API/datalist/patient-list.php') ?>
        <div class="input-group-append ">
            <span class="input-group-text" role="button" id="refresh-patient-list">
                <i class="material-icons">sync</i>
            </span>
        </div>
    </div>
    <small class="text-success" id="refresh-message">Patient List has been refreshed</small>
    <small class="feedback d-none bg-danger p-1 rounded my-1">
        Please select a valid patient.
    </small>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#refresh-message").hide();
    $("#refresh-patient-list").click(function() {
        Swal.fire({
            title: 'Refreshing Patient List',
            text: 'Please wait...',
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        $("#patientAccountName").val("");
        $.ajax({
            url: '/Zarate/API/patient/view-charge-slip.php',
            type: 'POST',
            success: function(response) {
                $("#refresh-message").show();
                // hide after 5 seconds
                setTimeout(function() {
                    $("#refresh-message").hide();
                }, 5000);
                const patientList = response.data;
                console.log(patientList);
                var newPatientListOptions = "";
                for (let i = 0; i < patientList.length; i++) {
                    const patient = patientList[i];
                    newPatientListOptions += `<option value="${patient.lname}, ${patient.fname} ${patient.mname} | ID: ${patient.hospistalrecordNo}"></option>`;
                }
                $("#patientList").html(newPatientListOptions);
                Swal.close();
            },
            error: function(error) {
                // Handle AJAX error
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'An Error Occurred! Please refresh the page and try again.',
                    text: 'An error occurred!',
                });
            }
        });

        // $.ajax({
        //     url: "../API/datalist/patient-list.php",
        //     type: "GET",
        //     success: function(data) {
        //         $("#patientList").html(data);
        //     }
        // });
    });
</script>

</html>