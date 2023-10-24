<!DOCTYPE html>
<html lang="en">

<body>
    <div class="modal fade" data-bs-backdrop="static" id="viewItemModal" tabindex="-1" role="dialog" aria-labelledby="viewItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">View Customer Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewModalBody">
                    <!-- Table Data will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeViewModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#closeViewModal').click(function() {
        $('#viewItemModal').modal('hide'); // Close the modal when the close button is clicked
    });
</script>
</html>