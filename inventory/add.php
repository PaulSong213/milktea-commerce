<!DOCTYPE html>

<html lang="en">

<head>
    <title>Suggested Input Text</title>
    <style>
        /* Some basic styling */
        #container {
            position: relative;
        }

        #suggestions {
            position: absolute;
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
            width: 100%;
            /* Match the input width */
            background-color: white;
            /* To match input background */
            border-top: none;
            /* To remove border overlap */
            border-bottom-left-radius: 4px;
            /* Rounded corners */
            border-bottom-right-radius: 4px;
        }

        /* Add a class to show suggestions */
        #suggestions.active {
            opacity: 1;
        }
    </style>
</head>

<body>
    <form method="POST" action="addfunction.php">

        <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                        <button type="button" class="close" id="Closemodal1" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                        <label for="item_code">Item Code:</label>
                        <input type="text" id="item_code" name="item_code" class="form-control"
                            placeholder="Enter item code" required>

                        <div id="container">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Input Type">
                            <div id="suggestions"></div>
                        </div>

                        <script>
                            const inputElement = document.getElementById("type");
                            const suggestionsElement = document.getElementById("suggestions");

                            const suggestions = ["Pcs", "Boxes", "MiliLiters", "Liters", "Unit"];

                            inputElement.addEventListener("input", function () {
                                const inputValue = inputElement.value.toLowerCase();
                                const filteredSuggestions = suggestions.filter(suggestion => suggestion.toLowerCase().includes(inputValue));

                                if (filteredSuggestions.length > 0) {
                                    suggestionsElement.classList.add("active");
                                } else {
                                    suggestionsElement.classList.remove("active");
                                }

                                suggestionsElement.innerHTML = "";
                                filteredSuggestions.forEach(suggestion => {
                                    const suggestionItem = document.createElement("div");
                                    suggestionItem.textContent = suggestion;
                                    suggestionItem.addEventListener("click", function () {
                                        inputElement.value = suggestion;
                                        suggestionsElement.classList.remove("active");
                                    });
                                    suggestionsElement.appendChild(suggestionItem);
                                });
                            });
                        </script>

                        <label for="Unit">Unit:</label>
                        <input type="number" id="Unit" class="form-control" name="Unit" placeholder="0"
                            required>

                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Enter description" required></textarea>

                        <label for="Generic">Generic:</label>
                        <input type="text" id="Generic" class="form-control" name="Generic" placeholder="Enter Generic"
                            required>

                        <label for="Sugprice">Sug Price:</label>
                        <input type="number" id="Sugprice" class="form-control" name="Sugprice" placeholder="0.0000"
                            required>

                        <label for="MWprice">MW Price:</label>
                        <input type="number" id="MWprice" class="form-control" name="MWprice" placeholder="0.00"
                            required>

                        <label for="IPDprice">IPD Percent:</label>
                        <input type="number" id="IPDprice" class="form-control" name="IPDprice" placeholder="0.00 %"
                            required>

                        <label for="Ppriceuse">Ppriceuse:</label>
                        <input type="number" id="Ppriceuse" class="form-control" name="Ppriceuse" placeholder="0.0000"
                            required>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="Closemodal2"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveItemButton" name="SaveItem">Save
                            Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</html>