<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Selection Modal</title>

    <!-- Include Bootstrap CSS (you may need to update the path) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        /* CSS for Category Boxes */
        .category-sidebar {
            background: url(./image/home-bg.jpg) no-repeat;
            background-position: center;
            background-size: cover;
            overflow-y: auto;
            height: 500px;
            /* Set a fixed height with vertical overflow */
            border-right: 1px solid #ccc;
        }

        .category-box {
            padding: 10px;
            border: 1px solid #ccc;
            margin: 10px 0;
            height: 150px;
            width: 150px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .category-box:hover {
            background-color: #f0f0f0;
        }

        /* CSS for Category Content */
        .category-content-container {
            background-image: url('category_background.jpg');
            /* Set your background image URL here */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 20px;
            color: #fff;
        }

        .category-content {
            animation: fade-in 0.5s ease-in-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- The Modal -->
    <div class="modal fade rounded mt-5" id="categoryModal">
        <div class="modal-dialog modal-lg p-3">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title">PRODUCT CART</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body row ">
                    <!-- Sidebar for Category selection -->
                    <div class="col-3 category-sidebar">
                        <div class="form-check category-box" data-category="category1" >
                            <input class="form-check-input" type="radio" name="category" id="category1" value="category1">
                        </div>
                        <div class="form-check category-box" data-category="category2">
                            <input class="form-check-input" type="radio" name="category" id="category2" value="category2">
                            <label class="form-check-label" for="category2">COFFEE</label>
                        </div>
                        <div class="form-check category-box" data-category="category3">
                            <input class="form-check-input" type="radio" name="category" id="category3" value="category3">
                            <label class="form-check-label" for="category3">BURGERS</label>
                        </div>
                        <div class="form-check category-box" data-category="category3">
                            <input class="form-check-input" type="radio" name="category" id="category3" value="category3">
                            <label class="form-check-label" for="category3">BURGERS</label>
                        </div>
                        <div class="form-check category-box" data-category="category3">
                            <input class="form-check-input" type="radio" name="category" id="category3" value="category3">
                            <label class="form-check-label" for="category3">BURGERS</label>
                        </div>
                    </div>

                    <!-- Content forms -->
                    <div class="col-7 category-content-container">
                        <div id="category1" class="category-content" style="display:none;">
                            <form>
                                <div class="form-group">
                                    <label for="content1">Content 1:</label>
                                    <input type="text" class="form-control" id="content1" name="content1">
                                </div>
                            </form>
                        </div>
                        <div id="category2" class="category-content" style="display:none;">
                            <form>
                                <div class="form-group">
                                    <label for="content2">Content 2:</label>
                                    <input type="text" class="form-control" id="content2" name="content2">
                                </div>
                            </form>
                        </div>
                        <div id="category3" class="category-content" style="display:none;">
                            <form>
                                <div class="form-group">
                                    <label for="content3">Content 3:</label>
                                    <input type="text" class="form-control" id="content3" name="content3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (you may need to update the path) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>