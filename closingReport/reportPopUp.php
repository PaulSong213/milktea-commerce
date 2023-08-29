<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Closing Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #uiContainer {
            background-color: #001f3f;
            padding: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #dateTimeInfo, .form-label, .btn-primary, .btn-success {
            color: white;
        }
        #text {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Separate container for UI elements -->
    <div id="uiContainer" class="d-block w-100">
        <div class="py-3">
            <div class="d-flex justify-content-between">
                <div style="margin-right: 15px;">
                    <h3 id="text" class="fw-bold mb-1">CLOSING REPORT</h3>
                </div>
                <div class="d-flex flex-column">
                    <h3 class="mb-1" id="closingReport"></h3>
                   
                </div>
            </div>
        </div>
        <div class="mb-2">
            <label for="inputDate" class="form-label">Select Date</label>
            <input type="date" class="form-control" id="inputDate">
        </div>
        <div class="mb-2">
            <label for="inputTimeIn" class="form-label">Select Time In</label>
            <input type="time" class="form-control" id="inputTimeIn">
        </div>
        <div class="mb-2">
            <label for="inputTimeOut" class="form-label">Select Time Out</label>
            <input type="time" class="form-control" id="inputTimeOut">
        </div>
        <div class="d-flex justify-content-end">
            <button id="printButton" type="button" class="btn btn-success" style="display: none;">Print</button>
            <button id="confirmButton" type="button" class="btn btn-primary">Confirm</button>
        </div>
    </div>

    <div class="modal fade" data-bs-backdrop="static" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printModalLabel">Print Closing Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border p-4 m-4 shadow" id="reportPopUp">
                    <!-- Content from fetch_data.php will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="printModalButton" type="button" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#confirmButton").click(function () {
                var selectedDate = $("#inputDate").val();
                var selectedTimeIn = $("#inputTimeIn").val();
                var selectedTimeOut = $("#inputTimeOut").val();

                if (selectedDate && selectedTimeIn && selectedTimeOut) {
                    var dateTimeIn = selectedDate + ' ' + selectedTimeIn;
                    var dateTimeOut = selectedDate + ' ' + selectedTimeOut;

                    $.ajax({
                        url: "fetch_data.php",
                        method: "POST",
                        data: {
                            dateTimeIn: dateTimeIn,
                            dateTimeOut: dateTimeOut
                        },
                        success: function (response) {
                            var dateTimeRange = selectedDate + ' ' + selectedTimeIn + ' - ' + selectedTimeOut;
                            // Update the Closing Report header
                            $("#closingReport").text("CLOSING REPORT AS OF:");
                            $("#dateTimeInfo").text(dateTimeRange);
                            // Show the fetched data in the modal
                            $("#reportPopUp").html(response);

                            // Show the modal
                            var printModalPopup = new bootstrap.Modal($('#printModal'), {});
                            printModalPopup.show();
                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching data:", error);
                        }
                    });
                } else {
                    alert("Please select date, time in, and time out.");
                }
            });

            $("#printModalButton").click(function () {
                var printContents = $("#reportPopUp").html();
                var originalContents = document.body.innerHTML;

                // Set body content to the modal content for printing
                document.body.innerHTML = printContents;
                window.print();

                // Restore original body content
                document.body.innerHTML = originalContents;
            });
        });
    </script>
</body>
</html>
