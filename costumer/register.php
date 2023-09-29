<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="py-3" style="min-height: 100vh;background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <form method="POST" action="./controller/register.php" class="mx-1 mx-md-4">

                                        <!-- FIRST NAME -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="firstName">First Name</label>
                                                <input required type="text" id="firstName" class="form-control" name="firstName" placeholder="Enter your First name" />
                                            </div>
                                        </div>

                                        <!-- LAST NAME -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="lastName">Last Name</label>
                                                <input required type="text" id="lastName" class="form-control" name="lastName" placeholder="Enter your Last name" />
                                            </div>
                                        </div>

                                        <!-- EMAIL -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="email">Email Address</label>
                                                <input required type="email" id="email" class="form-control" name="email" placeholder="Enter your Email Address" />
                                            </div>
                                        </div>

                                        <!-- PASSWORD -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="password">Password</label>
                                                <input required type="password" id="password" class="form-control" name="password" placeholder="Enter your Password" />
                                            </div>
                                        </div>

                                        <!-- CONFIRM PASSWORD -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="password">Confirm Password</label>
                                                <input required type="password" id="cpassword" class="form-control" name="password" placeholder="Enter your Password" />
                                            </div>
                                        </div>

                                        <!-- PHONE NUMBER -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                                <input required type="tel" id="phoneNumber" class="form-control" name="phoneNumber" placeholder="Enter your Phone Number" />
                                            </div>
                                        </div>

                                        <!-- DATE OF BIRTH -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-calendar-alt fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="dateOfBirth">Date of Birth</label>
                                                <input required type="date" id="dateOfBirth" class="form-control" name="dateOfBirth" placeholder="Select your Date of Birth" />
                                            </div>
                                        </div>

                                        <!-- SHIPPING ADDRESS -->
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-map-marker-alt fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label fw-bold" for="shippingAddress">Shipping Address</label>

                                                <div class="ps-2">
                                                    <label for="region" class="form-label">Region</label>
                                                    <select class="form-select mb-2" name="region" id="region">
                                                        <option disabled>Select Region</option>
                                                    </select>

                                                    <label for="province" class="form-label">Province</label>
                                                    <select class="form-select mb-2" name="province" id="province">
                                                        <option disabled>Select Province</option>
                                                    </select>

                                                    <label for="municipality" class="form-label">Municipality</label>
                                                    <select class="form-select mb-2" name="municipality" id="municipality">
                                                        <option disabled>Select Municipality</option>
                                                    </select>

                                                    <label for="barangay" class="form-label">Barangay</label>
                                                    <select class="form-select mb-2" name="barangay" id="barangay">
                                                        <option disabled>Select Barangay</option>
                                                    </select>

                                                    <label for="otherAddress" class="form-label">Street, Blk, Lot, Building No.</label>
                                                    <input required class="form-control mb-2" type="text" name="otherAddress" id="otherAddress" placeholder="Enter Blk, Lot, Building No.">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center ms-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg w-100">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="/milktea-commerce/img/undraw_coffee_re_x35h.svg" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            fetch('ph.json')
                .then(response => response.json())
                .then(phJSON => {
                    console.log(phJSON);
                    let isFirstLoad = true;
                    for (region in phJSON) {
                        $('#region').append(`<option ${region === "4A" ? "selected" : ""} value="${region}">${region}</option>`);
                    }

                    $('#region')
                        .on('change', () => {
                            const selectedRegion = $('#region').val();
                            const currentRegions = phJSON[selectedRegion].province_list;
                            $('#province').empty();
                            $('#municipality').empty();
                            $('#barangay').empty();
                            for (province in currentRegions) {
                                $('#province').append(`<option ${isFirstLoad && province === "CAVITE" ? "selected" : ""} value="${province}">${province}</option>`);
                            }
                            $('#province').change();
                            $('#municipality').change();
                        })
                        .change();

                    $('#province')
                        .on('change', () => {
                            const selectedProvince = $('#province').val();
                            const selectedRegion = $("#region").val();
                            console.log(selectedProvince, selectedRegion);
                            const currentMunicipalities = phJSON[selectedRegion]["province_list"][selectedProvince]["municipality_list"];
                            $('#municipality').empty();
                            $('#barangay').empty();
                            for (municipality in currentMunicipalities) {
                                $('#municipality').append(`<option ${isFirstLoad && municipality === "BACOOR CITY" ? "selected" : ""} value="${municipality}">${municipality}</option>`);
                            }
                            $('#municipality').change();
                        })
                        .change();

                    $('#municipality')
                        .on('change', () => {
                            const selectedMunicipality = $('#municipality').val();
                            const selectedProvince = $("#province").val();
                            const selectedRegion = $("#region").val();
                            console.log(selectedMunicipality, selectedProvince, selectedRegion);
                            const currentBarangays = phJSON[selectedRegion]["province_list"][selectedProvince]["municipality_list"][selectedMunicipality]["barangay_list"];
                            for (index in currentBarangays) {
                                const barangay = currentBarangays[index];
                                $('#barangay').append(`<option ${barangay === "ALIMA" ? "selected" : ""} value="${barangay}">${barangay}</option>`);
                            }
                        })
                        .change();

                    isFirstLoad = false;

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        function validatePassword() {
            var password = document.getElementById("Password").value;
            var cPassword = document.getElementById("CPassword").value;

            if (password !== cPassword) {
                alert("Passwords do not match. Please re-enter.");
                return false;
            }

            return true;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const cPasswordInput = document.getElementById("cpassword");

            cPasswordInput.addEventListener("input", function() {
                if (passwordInput.value !== cPasswordInput.value) {
                    cPasswordInput.setCustomValidity("Passwords do not match.");
                } else {
                    cPasswordInput.setCustomValidity("");
                }
            });
        });
    </script>
</body>

</html>