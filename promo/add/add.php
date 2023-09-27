<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggested Input Text</title>
</head>




<body>
    <form method="POST" action="./add/addfunction.php" autocomplete="on" id="addItemForm" enctype="multipart/form-data">
        <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <img id="uploaded-image" src="add/image/promo.png" alt="Uploaded Image" style="width: 130px; height: 130px; border-radius: 50%;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="photo">Product Photo<span class="text-danger mx-1">*</span></label>
                            <input class="form-control" type="file" name="photo" id="upload-input" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="item_code">Promo Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="item_code" name="item_code" class="form-control" placeholder="Enter item code" autocomplete="on" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="minimum_spend">Minimum Spend<span class="text-danger mx-1">*</span></label>
                                <input type="number" id="minimum_spend" name="minimum_spend" class="form-control" placeholder="Enter item code" autocomplete="on" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="percentage">Percentage<span class="text-danger mx-1">*</span></label>
                                <input type="number" id="percentage" name="percentage" class="form-control" placeholder="Enter item code" autocomplete="on" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description<span class="text-danger mx-1">*</span></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter description" required autocomplete="on"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date">Promo Expiry<span class="text-danger mx-1">*</span></label>
                            <input type="date" id="date" name="date" class="form-control" placeholder="Enter item code" autocomplete="on" required>
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
    document.addEventListener('DOMContentLoaded', function() {
        const uploadInput = document.getElementById('upload-input');
        const uploadedImage = document.getElementById('uploaded-image');

        uploadInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>