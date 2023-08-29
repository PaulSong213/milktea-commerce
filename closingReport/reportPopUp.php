<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Closing Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Button to open the modal -->
    <button id="openModalButton" type="button" class="btn btn-primary">Open Popup</button>

    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="printModal" tabindex="-1"
        aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Closing Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border p-4 m-4 shadow">
                    <div id="reportPopUp">
                        <div class="py-3">
                            <div class="d-flex">
                                <div style="margin-right: 15px;">
                                    <h3 class="fw-bold mb-1">CLOSING REPORT</h3>
                                </div>
                                <div class="d-flex flex-column">
                                <h3 class="mb-1" id="closingReport"></h3>
                                <p id="dateTimeInfo"></p> <!-- This element will hold the selected date, time in, and time out -->
                                </div>
                            </div>
                        </div>
                        <!-- Date Input Field -->
                       <div class="mb-2">
                        <label for="inputDate" class="form-label">Select Date</label>
                         <input type="date" class="form-control" id="inputDate">
                         </div>
                        <!-- Time In Input Field -->
                        <div class="mb-2">
                        <label for="inputTimeIn" class="form-label">Select Time In</label>
                         <input type="time" class="form-control" id="inputTimeIn">
                        </div>
                        <!-- Time Out Input Field -->
                        <div class="mb-2">
                        <label for="inputTimeOut" class="form-label">Select Time Out</label>
                        <input type="time" class="form-control" id="inputTimeOut">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="confirmButton" type="button" class="btn btn-primary">Confirm</button>
                    <button id="printButton" type="button" class="btn btn-success" style="display: none;">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Open the modal when the "Closing Report" button is clicked
            $("#openModalButton").click(function () {
                var exampleModalPopup = new bootstrap.Modal($('#printModal'), {});
                exampleModalPopup.show();
            });

            $("#confirmButton").click(function() {
        var selectedDate = $("#inputDate").val();
        var selectedTimeIn = $("#inputTimeIn").val();
        var selectedTimeOut = $("#inputTimeOut").val();

        if (selectedDate && selectedTimeIn && selectedTimeOut) {
            var dateTimeIn = selectedDate + ' ' + selectedTimeIn;
            var dateTimeOut = selectedDate + ' ' + selectedTimeOut;
            
            // Fetch data using AJAX
                $.ajax({
                url: "fetch_data.php",
                method: "POST",
                data: {
                    dateTimeIn: dateTimeIn,
                    dateTimeOut: dateTimeOut
                },
                success: function (response) {
                    // Update the modal content with fetched data
                    $("#reportPopUp").html(response);

                    // Update the Closing Report header
                    $("#closingReport").text(selectedDate + ' ' + selectedTimeIn + ' - ' + selectedTimeOut);

                    // Hide the Confirm button and show the Print button
                    $("#confirmButton").hide();
                    $("#printButton").show();
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        } else {
            alert("Please select date, time in, and time out.");
        }
    });

        

            // Handle Print button click
            $("#printButton").click(function () {
                var printContents = $("#reportPopUp").html();
                var originalContents = document.body.innerHTML;

                // Set body content to the modal content for printing
                document.body.innerHTML = printContents;
                window.print();

                // Restore original body content
                document.body.innerHTML = originalContents;
            });

            // Handle Close button click
            $("#closeButton").click(function () {
                // Reset modal inputs and hide modal
                $("#inputDate").val("");
                $("#inputTimeIn").val("");
                $("#inputTimeOut").val("");
                var exampleModalPopup = new bootstrap.Modal($('#printModal'), {});
                exampleModalPopup.hide();
            });
        });
    </script>
</body>

</html>
