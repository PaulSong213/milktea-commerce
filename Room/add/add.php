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
                        <h5 class="modal-title" id="addItemModalLabel">Add Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <b><label class="form-label" for="lname">Room Information<span class="text-danger mx-1"></span></label></b>
                        <!-- Your modal content goes here -->
                        <!-- LastName -->
                        <div class="mb-3">
                            <label class="form-label" for="roomRef">Room Ref.<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="roomRef" name="roomRef" class="form-control" placeholder="Enter Last Name" autocomplete="on" required>
                        </div>
                        <!-- FirstName -->
                        <div class="mb-3">
                            <label class="form-label" for="roomDescription">Room Description<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="roomDescription" name="roomDescription" class="form-control" placeholder="Enter First Name" autocomplete="on" required>
                        </div>
                      
                        <div class="mb-3">
                            <label class="form-label" for="rateperDay">Rate Per Day<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="rateperDay" name="rateperDay" class="form-control" placeholder="Enter Middle Name" autocomplete="on" required>
                        </div>
                       
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="SaveItem">Save Item</button>
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