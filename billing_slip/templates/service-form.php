<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="modal fade" data-bs-backdrop="static" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-center">
                        <h5 class="modal-title" id="serviceModalLabel">Print Request Form</h5>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="service-form-container" class="modal-body border p-4 m-4 shadow mx-auto" style="overflow-x: auto; width: max-content; max-width: 100%">
                    <div class="px-1" id="service-form" style="width: 600px;">
                        <!-- HEADER -->
                        <div class="d-flex flex-column justify-content-center align-items-center py-3 w-100 m-0">
                            <div class="d-flex">
                                <img style="height: 40px;" src="/Zarate/img/logo.png" alt="ZARATE LOGO">
                                <div class="mx-3 d-flex flex-column justify-content-end ">
                                    <h5 class="fw-bold text-center my-0">E. Zarate Hospital</h5>
                                    <small class="fw-bold">DOH LICENSED & PHA - MEMBER PRIMARY SCHOOL</small>
                                </div>
                            </div>
                            <small style="font-size: 12px;">16 J. Aguilar Avenue, Talon, Las Piñas City, Metro Manila, Philippines 1747</small>
                            <small style="font-size: 12px;">Tel. No. +632-871-1440 +632-874-695 Fax +632-8735692 E-mail: <span class="text-decoration-underline">zarateclinic@yahoo.com</span></small>
                        </div>

                        <!-- INFORMATION -->
                        <div>
                            <div class="row ps-1" style="font-size: 12px;">
                                <div class="col pe-0 d-flex">
                                    <span>Hospital #:</span>
                                    <span id="formHospitalNo" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                                <div class="col ps-1 pe-0 d-flex">
                                    <span>CS #:</span>
                                    <span id="formCSNo" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                                <div class="col ps-1 pe-0 d-flex">
                                    <span>Request Form #:</span>
                                    <span id="formRequestNo" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                                <div class="col ps-1 pe-0 d-flex">
                                    <span>Date:</span>
                                    <span id="formDate" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                            </div>
                            <div class="row ps-1 py-1" style="font-size: 12px;">
                                <div class="col pe-0 d-flex">
                                    <span>Name:</span>
                                    <span id="formPatientName" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                            </div>
                            <div class="row ps-1" style="font-size: 12px;">
                                <div class="col pe-0 d-flex">
                                    <span>Birthday:</span>
                                    <span id="formPatientBday" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                                <div class="col ps-1 pe-0 d-flex">
                                    <span>Age:</span>
                                    <span id="formPatientAge" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                                <div class="col ps-1 pe-0 d-flex">
                                    <span>Sex:</span>
                                    <span id="formPatientSex" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                            </div>
                            <div class="row ps-1 py-1 Ultrasound-only d-none" style="font-size: 12px;">
                                <div class="col pe-0 d-flex">
                                    <span>c/c or reason of test:</span>
                                    <span id="testReason" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                            </div>
                            <div class="row ps-3 Laboratory-only d-none" style="font-size: 12px;">
                                <div class="col-5 ps-1 pe-0 d-flex">
                                    <span>Date/Time Collection:</span>
                                    <span id="dateTimeCollection" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                                <div class="col-7 ps-1 pe-0 d-flex">
                                    <span>DX / C/C:</span>
                                    <span id="dxCC" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1 fw-bold"></span>
                                </div>
                            </div>
                        </div>

                        <!-- FORM TITLE -->
                        <h5 id="requestTitle" class="fw-bold text-center my-3">REQUEST FORM</h5>

                        <!-- servicesAvailedContainer -->
                        <div class="d-flex">
                            <div class="d-flex flex-column mb-1 flex-grow-1 " id="servicesAvailedContainer"></div>
                            <div class="border border-dark h-max p-1 d-flex flex-column Ultrasound-only d-none" style="height: max-content; width: 35%">
                                <span class="text-center" style="font-size: 12px;">Remarks/Special Instructions:</span>
                                <span id="formRemarks" class="text-decoration-underline w-full d-block text-center" >None</span>
                            </div>
                        </div>

                        <!-- FOR X-RAY ONLY FIELD -->
                        <div class="row ps-1 py-1 X-Ray-only d-none">
                            <div class="col-12 pe-0 d-flex">
                                <span>CHIEF COMPLAINT:</span>
                                <span id="formCheifComplaint" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1"></span>
                            </div>
                            <div class="col-12 pe-0 d-flex">
                                <span>WORKING DX:</span>
                                <span id="workingDXComplaint" class="flex-grow-1 border-bottom border-1 border-dark d-block ps-1"></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mb-2 mt-4">
                            <div class="flex flex-column justify-content-center align-items-center mt-2" style="width: max-content;">
                                <h6 class="text-center my-0" id="requestEmployee"></h6>
                                <small id="requestorType" class="border-top border-2 border-dark w-100 d-block text-center">REQUESTING PHYSICIAN</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="print-service-form" type="button" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        import {
            formatDate
        } from "/Zarate/costum-js/date.js";
        window.formatDate = formatDate;
    </script>
    <script defer>
        async function showServiceForm(serviceID, appendToElement = null) {
            try {
                Swal.fire({
                    title: 'Generating Print Report',
                    html: 'Please Wait!',
                    allowOutsideClick: false,
                });
                swal.showLoading();

                const response = await $.ajax({
                    url: `/Zarate/API/services/search.php?serviceID=${serviceID}`,
                    type: 'GET',
                });
                swal.close();
                const service = JSON.parse(response);
                console.log(service);

                const servicesAvailedContainer = $("#servicesAvailedContainer");
                servicesAvailedContainer.html("");
                const itemsAvailed = JSON.parse(service.Services);
                for (let i = 0; i < itemsAvailed.length; i++) {
                    const item = itemsAvailed[i];
                    servicesAvailedContainer.append($(`
                    <span>✓ ${item.product_desciption}</span>
                    `));
                }
                console.log(service.departmentDescription);
                $(`.${service.departmentDescription}-only`).removeClass("d-none");

                if (service.departmentDescription === "Ultrasound") service.departmentDescription = "Ultrasound and Imaging"; // constumized ultrasound title
                $("#requestTitle").text(`${service.departmentDescription.toUpperCase()} REQUEST FORM`);
                $("#requestEmployee").text(`${service.requestedEmployeeTitle} ${service.requestedEmployeeFirstName} ${service.requestedEmployeeMiddleName} ${service.requestedEmployeeLastName}`);
                $("#transactionID").text(`${service.transID}`);

                if (service.departmentDescription == "Ultrasound") $("#requestorType").text("REQUESTING MD");

                $("#formRequestNo").text(`${service.transID}`);
                $("#formHospitalNo").text(`${service.patientID}`);
                $("#formPatientName").text(`${service.patientFirstName} ${service.patientMiddleName} ${service.patientLastName}`);
                $("#formPatientBday").text(`${window.formatDate(new Date(service.patientBDate),false)}`);
                $("#formPatientAge").text(`${service.patientAge}`);
                $("#formPatientSex").text(`${service.patientGender}`);
                $("#formCSNo").text(`${service.ChargeNo}`);
                $("#formCheifComplaint").text(`${service.ChiefComplaint}`);
                $("#workingDXComplaint").text(`${service.WorkingDx}`);
                if(service.remarks)$("#formRemarks").text(`${service.remarks}`);
                $("#testReason").text(`${service.testReason}`);
                $("#formDate").text(`${window.formatDate(new Date(service.transactionDate))}`);
                $("#dateTimeCollection").text(`${window.formatDate(new Date(service.dateTimeCollection))}`);
                $("#dxCC").text(`${service.WorkingDx}`);

                if (appendToElement) {
                    $(appendToElement).html("");
                    $(appendToElement).append($("#service-form-container").html());
                } else {
                    var exampleModalPopup = new bootstrap.Modal($('#serviceModal'), {});
                    exampleModalPopup.show();
                }

                $("#print-service-form, #print-service-form-header").click(function() {
                    printServiceForm();
                });
                return service;
            } catch (error) {
                console.error(error);
                swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'There was something wrong printing the form.',
                    text: error,
                });
            }
        }

        <?php
        if (isset($_SESSION['printServiceFormId'])) {
            $printServiceFormId = $_SESSION['printServiceFormId'];
            echo "showServiceForm(`" . $printServiceFormId . "`)";
            unset($_SESSION['printServiceFormId']);
        }
        ?>

        function printServiceForm() {
            var divToPrint = document.getElementById('service-form').innerHTML;
            var newWin = window.open('', '_blank');

            newWin.document.write(`<html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <style>
            @media print {
                @page {
                    size: A5;
                    margin: 10px;
                }
            }
            </style>
            </head><body>`);
            newWin.document.write(divToPrint);
            newWin.document.write('</body></html>');

            newWin.document.close();

            newWin.onload = function() {
                newWin.print();
                newWin.close();
            };
        }
    </script>
</body>


</html>