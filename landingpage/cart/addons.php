<?php
require_once '././php/connect.php';
include_once 'index.php';
// Establish a database connection
$conn = connect();

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Construct the SQL query to get data from addons_tb
$query = "SELECT * FROM addons_tb where status = 1";
$result = $conn->query($query);
?>
<div class="modal fade" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" id="addonsmodal">
    <div class="modal-dialog modal-dialog-centered modal-lg rounded">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Add-Ons and Sugar Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow-y: scroll;">
                <div class="container-fluid justify-content-center">
                    <div class="row">
                        <div class="col-md-6 product-container">
                            <div class="product-image">
                                <img src="#" alt="Product Image" id="AddonsProdimage" name="AddonsProdimage">
                            </div>
                            <div class="product-details text-center">
                                <h3 class="product-name"> <span name="AddonsProdName" id="AddonsProdName"></span></h3>

                            </div>
                        </div>

                        <div class="col-md-6 addOnsSelectSugarContainer">
                            <div class="row">
                                <div class="sizeSelectAdons fw-bold" style="font-size:1.5rem ">
                                    <label for="Size">Size</label>
                                    <input class="sizeSelect" type="text" name="size" id="sizeSelectStart" autocomplete="off" list="sizeOptionSelect" placeholder="Select Size">
                                    <datalist id="sizeOptionSelect">
                                    </datalist>
                                </div>
                                <div class="sugar-level fw-bold" style="font-size:1.5rem ">
                                    <label for="sugarLevel">Sugar Level:</label>
                                    <select id="sugarLevel" name="sugarLevel">
                                        <option value="">Select Sugar Level</option>
                                        <option value="0%">0%</option>
                                        <option value="25%">25%</option>
                                        <option value="50%">50%</option>
                                        <option value="75%">75%</option>
                                        <option value="100%">100%</option>
                                    </select>
                                </div>
                                <div class="mt-4 addOnsContainer" style="border:black 3px;">
                                    <label class="fw-bold" style="font-size:1.5rem ">Add-Ons</label>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <?php
                                        $image = '././addOns/' . $row["addImage"];
                                        $addid = $row["addID"];
                                        $description = $row["description"];
                                        $price = $row["price"];
                                        ?>
                                        <div class="row">
                                            <div class="col-12 my-3">
                                                <label class="custom-checkbox d-flex align-items-center mb-1  rounded ">
                                                    <input type="checkbox" name="addon[]" value="<?php echo $addid; ?>" id="addon<?php echo $addid; ?>">
                                                    <span class="checkmark me-2"></span>
                                                    <div id="addon<?php echo $addid; ?>" class="addon-description d-flex align-items-center">
                                                        <div class="addon-info">
                                                            <span class="price-text fw-bold"><?php echo '₱ ' . $price; ?></span>
                                                            <span class="description-text"><?php echo $description; ?></span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="doneButton">
                    <i class="fas fa-cart-plus"></i>
                    Add To Cart</button>
            </div>
        </div>
    </div>
</div>
<script>
    // $("#addonsmodal").modal("show")
</script>

<style>
    /* Custom checkbox styling */
    .custom-checkbox {
        position: relative;
        padding-left: 40px;
        cursor: pointer;
        font-size: 18px;
        user-select: none;
    }

    .custom-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        background-color: #fff;
        border: 2px solid #2196F3;
        border-radius: 50%;
    }

    .custom-checkbox:hover input~.checkmark {
        background-color: #ccc;
    }

    .custom-checkbox input:checked~.checkmark {
        background-color: #2196F3;
        border: none;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .custom-checkbox input:checked~.checkmark:after {
        display: block;
    }

    .custom-checkbox .checkmark:after {
        content: "";
        position: absolute;
        left: 8px;
        top: 50%;
        transform: translate(-50%, -50%) rotate(45deg);
        width: 12px;
        height: 6px;
        border: solid white;
        border-width: 0 2px 2px 0;
    }

    /* Addon description styling */
    .addon-description {
        display: flex;
        align-items: center;
    }

    .description-text {
        flex-grow: 1;
        margin-right: 20px;
    }

    .addon-image {
        max-width: 50px;
        max-height: 50px;
    }

    .product-container {
        background-color: #f8f8f8;
        /* Change the background color to your preference */
        border: 1px solid #ddd;
        /* Add a border for separation */
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        /* Add a subtle box shadow */
    }

    .product-image img {
        max-width: 100%;
        /* Ensure the image fits within its container */
        display: block;
        /* Remove any potential extra space below the image */
    }

    .product-name {
        font-size: 1.5rem;
        /* Increase font size for the product name */
    }

    .sugar-level {
        margin-top: 10px;
        /* Add some spacing between the product name and sugar level */
    }

    /* Style the select element */
    select {
        width: 100%;
        /* Make the select element span the entire width */
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #fff;
    }
</style>