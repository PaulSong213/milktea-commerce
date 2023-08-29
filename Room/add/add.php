<!DOCTYPE html>
<html lang="en">

<head>
   
</head>

<body>

    <form id="addItemForm" method="POST" action="./add/addfunction.php">
        <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add New Room</h5>
                        <button type="button" class="close" id="Closemodal1" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="room_ref"><b>Room Ref</b></label>
                        <input type="text" id="room_ref" name="room_ref" class="form-control" placeholder="Enter Room Ref" required>

                        <label for="room_description"><b>Room Description</b></label>
                        <input type="text" id="room_description" name="room_description" class="form-control" placeholder="Enter Room Description" required>

                        <label for="rate_per_day"><b>Rate Per Day</b></label>
                        <input type="number" id="rate_per_day" name="rate_per_day" class="form-control" placeholder="Enter Rate Per Day" required>

                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save Room</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Include Bootstrap and other necessary scripts and stylesheets here -->

</body>

</html>