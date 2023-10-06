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
$query = "SELECT * FROM addons_tb";

$result = $conn->query($query);

?>
<div class="modal fade" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" id="addonsmodal">
    <div class="modal-dialog modal-dialog-centered modal-lg rounded">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Add-ons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <?php
                    $image = '././addOns/' . $row["addImage"];
                    $addid = $row["addID"];
                    $description = $row["description"];
                    $price = $row["price"];
                    ?>
                    <div class="container" id="Product Preview"> 
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="custom-checkbox d-flex align-items-center mb-3">
                                <input type="checkbox" name="addon[]" value="<?php echo $addid; ?>" id="addon<?php echo $addid; ?>">
                                <span class="checkmark me-2"></span>
                                <div id="addon<?php echo $addid; ?>" class="addon-description">
                                    <span class="price-text fw-bold"><?php echo '₱ ' . $price . " - "; ?></span>
                                    <span class="description-text"><?php echo $description; ?></span>
                                    <img src="<?php echo $image; ?>" alt="<?php echo $description; ?>" class="addon-image">
                                </div>
                            </label>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="doneButton">Add To cart</button>
            </div>

        </div>
    </div>
</div>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // Get a reference to the "Done" button
    //     var doneButton = document.getElementById("doneButton");

    //     // Add a click event listener to the "Done" button
    //     doneButton.addEventListener("click", function() {
    //         // Get all the checkboxes with the name "addon[]"
    //         var checkboxes = document.querySelectorAll('input[name="addon[]"]:checked');

    //         // Create an array to store the selected addon data
    //         var selectedAddonsData = [];

    //         // Loop through the selected checkboxes and extract their values, description, and price
    //         checkboxes.forEach(function(checkbox) {
    //             var addonId = checkbox.value;
    //             var addonDescription = document.querySelector('#addon' + addonId + ' .description-text').textContent;
    //             var addonPrice = document.querySelector('#addon' + addonId + ' .price-text').textContent;

    //             selectedAddonsData.push({
    //                 id: addonId,
    //                 description: addonDescription,
    //                 price: addonPrice
    //             });
    //         });

    //         // Log the selected addon data to the console
    //         console.log("Selected Addon Data:", selectedAddonsData);
    //     });
    // });
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
</style>