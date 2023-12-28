<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggested Input Text</title>
</head>

<body>
    <form method="POST" action="./add/addfunction.php" autocomplete="on" id="addItemForm">
        <div class="modal fade" data-bs-backdrop="static" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Product Variant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <div class="mb-3">
                            <label class="form-label" for="sizeName">Product Size Name<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="sizeName" name="sizeName" class="form-control" placeholder="Enter Product Size Name" autocomplete="on" required>
                        </div>
                        

                        <div class="mb-3">
                            <label class="form-label" for="type">Product Type<span class="text-danger mx-1">*</span></label>
                            <select class="form-select" id="type" name="itemTypeID">
                                <?php
                                $connectionType = connect();
                                $sqlType = "select * from itemtype_tb";
                                $resultType = $connectionType->query($sqlType);
                                if (!$resultType) die($connectionType->error);
                                while ($rowType = $resultType->fetch_assoc()) {
                                    echo '<option value="' . $rowType["itemTypeID"] . '">' . $rowType["itemTypeCode"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter description" autocomplete="on"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price">Price<span class="text-danger mx-1">*</span></label>
                            <input type="text" id="price" name="price" class="form-control" placeholder="Enter product price" autocomplete="on" required>
                        </div>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="SaveItem">Save
                            Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>