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
                            <img id="uploaded-image" src="add/image/fast-food.png" alt="Uploaded Image" style="width: 130px; height: 130px; border-radius: 50%;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="item_code">Product Photo<span class="text-danger mx-1">*</span></label>
                            <input class="form-control" type="file" name="photo" id="upload-input" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="item_code">Product Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="item_code" name="item_code" class="form-control" placeholder="Enter product name" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="productType">Product Type<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="productType" name="itemTypeID">
                                <?php
                                $connectionType = connect();
                                $sqlType = "select * from itemtype_tb";
                                $resultType = $connectionType->query($sqlType);
                                if (!$resultType) die($connectionType->error);
                                while ($rowType = $resultType->fetch_assoc()) {
                                    echo '<option class="typeOption" is-drinkable="' . $rowType["is_drinkable"] . '" value="' . $rowType["itemTypeID"] . '">' . $rowType["itemTypeCode"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div id="basePriceSelect" class="mb-3 d-none">
                            <label class="form-label" for="basePrice">Price<span class="text-danger mx-1">*</span></label>
                            <input type="number" id="basePrice" name="basePrice" class="form-control" placeholder="Enter Price since select foods does not have variants" autocomplete="on">
                        </div>

                        <div class="mb-3">
                            <label for="description">Description<span class="text-danger mx-1">*</span></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter description" required autocomplete="on"></textarea>
                        </div>

                        <!-- <div class="mb-3 d-none">
                            <label class="form-label" for="variant">Variant Size<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="variant" name="variant" required>
                                <?php
                                // require_once '../php/connect.php';
                                // $connectionType = connect();
                                // $sqlDepartment = "select * from variant_tb";
                                // $resultDepartment = $connectionType->query($sqlDepartment);
                                // if (!$resultDepartment) die($connectionType->error);
                                // while ($rowType = $resultDepartment->fetch_assoc()) {
                                //     echo '<option value="' . $rowType["variantID"] . '">' . $rowType["variantName"] . ' | ' . '₱'  .  $rowType["price"] . '</option>';
                                // }
                                ?>
                            </select>
                        </div> -->
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
    $("#productType").change(function() {
        var selectedOption = $(this).find('option:selected');
        console.log(selectedOption.attr("is-drinkable"));
        if (selectedOption.attr("is-drinkable") == 1) {
            $("#basePriceSelect").addClass("d-none");
        } else {
            $("#basePriceSelect").removeClass("d-none");
        }
    });

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