

function validateForm() {
    const form = document.getElementById('addItemForm');
    const inputFields = form.querySelectorAll('.form-control');
    let isValid = true;

    // Remove "was-validated" class from all elements
    inputFields.forEach(input => {
        input.classList.remove('is-invalid');
    });

    // Additional validation logic
    // Example: Check if required fields are empty
    inputFields.forEach(input => {
        if (input.hasAttribute('required') && input.value.trim() === '') {
            input.classList.add('is-invalid');
            isValid = false;
        }
    });
}
document.getElementById('addItemForm').addEventListener('submit', function (event) {
    // Validate the form
    const form = event.target;
    const checkboxes = form.querySelectorAll('.form-check-input');
    const inputFields = form.querySelectorAll('.form-control');
    let isValid = true;

    // Remove "was-validated" class from all elements
    inputFields.forEach(input => {
        input.classList.remove('is-invalid');
    });
    // Additional validation logic
    // Example: Check if required fields are empty
    inputFields.forEach(input => {
        if (input.hasAttribute('required') && input.value.trim() === '') {
            input.classList.add('is-invalid');
            isValid = false;
        }
    });

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: 'Please fill in all required fields.',
        });
    }
});


function updateProductInfo(input) {
    var selectedValue = input.value;
    var row = input.closest("tr");
    var invInput = row.querySelector('[name="inv"]');
    var image = row.querySelector('[name="image[]"]');
    var product_desciption = row.querySelector('[name="product_desciption[]"]');
    var priceInput = row.querySelector('[name="price[]"]');
    var itemTypeInput = row.querySelector('[name="itemType[]"]');
    var idInput = row.querySelector('[name="id[]"]');
    var itemTypeIDInput = row.querySelector('[name="itemTypeID[]"]');
    var qtyInput = row.querySelector('[name="qty[]"]');

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getproductdetails.php?InventoryID=" + selectedValue, true);
    xhr.onreadystatechange = function (input) {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(selectedValue);
                var response = JSON.parse(xhr.responseText);
                invInput.value = response.inv;
                product_desciption.value = response.itemDescription;
                priceInput.value = response.price;
                itemTypeInput.value = response.itemtype;
                idInput.value = response.id;
                itemTypeIDInput.value = response.itemTypeID;
                image.value = response.image;

                console.log("Response:", response);

                // handle sizes
                var itemTypeID = response.itemTypeID;
                const sizeSelect = row.querySelector('[name="size[]"]');
                $.ajax({
                    url: "getproductVariant.php",
                    method: "GET",
                    data: {
                        itemTypeID: itemTypeID
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        sizeSelect.innerHTML = "";
                        data.forEach(size => {
                            if (priceInput.value <= 0) priceInput.value = Number(size.price).toFixed(2);
                            const option = document.createElement('option');
                            option.value = size.variantID;
                            option.innerHTML = size.variantName;
                            sizeSelect.appendChild(option);
                            sizeSelect.addEventListener("change", function (e) {
                                const value = e.target.value;
                                const price = data.find(size => size.variantID == value).price;
                                console.log(price);
                                qtyInput.value = 1;
                                priceInput.value = Number(price).toFixed(2);
                                CalculateValues(row);
                            });
                        });
                        CalculateValues(row);
                    }
                });
            } else {
                console.error("Failed to fetch product details");
            }
        }
    };
    xhr.send();

}

function removeRow(button) {
    const row = button.parentNode.parentNode;
    const productIdInput = row.querySelector('[name="product_id[]"]');
    const productCode = productIdInput.value;

    row.parentNode.removeChild(row);

    CalculateValues(row);

}
// Function to add a new row
function addRow() {
    window.scrollTo(0, document.body.scrollHeight);
    const templateRow = document.querySelector('[name="templateRow"]');
    const newRow = templateRow.cloneNode(true);
    newRow.removeAttribute("style"); // Show the cloned row

    // Clear values of cloned input fields
    const inputFields = newRow.querySelectorAll("input");
    inputFields.forEach(input => {
        let nextInputValue = "";
        if (input.getAttribute("name") === "qty[]") {
            nextInputValue = "1";
        }
        if (input.getAttribute("name") === "disc_percent[]") {
            nextInputValue = "0";
        }
        input.value = nextInputValue;
    });
    attachInputListeners(newRow); // Add 
    // Add the new row to the table
    const tbody = document.querySelector("tbody");
    tbody.appendChild(newRow);
    attachInputListeners(newRow); // Attach input listeners to the new row
}

// Function to attach input listeners
function attachInputListeners(row) {
    const inputFields = row.querySelectorAll("input");
    inputFields.forEach(input => {
        input.addEventListener("input", function () {
            CalculateValues(row);
        });
    });
}
// Function to display values and calculate subtotal
function CalculateValues(row) {
    const price = parseFloat(row.querySelector('[name="price[]"]').value) || 0;
    const qty = parseFloat(row.querySelector('[name="qty[]"]').value) || 1;
    const discPercent = parseFloat(row.querySelector('[name="disc_percent[]"]').value) || 0;
    const inventory = parseFloat(row.querySelector('[name="inv"]').value) || 0;
    const subtotal = qty * price;
    const discount = subtotal * (discPercent / 100);
    const totalWithDiscount = subtotal - discount;

    const subtotalInput = row.querySelector('[name="subtotal[]"]');
    subtotalInput.value = totalWithDiscount.toFixed(2);

    const DiscInput = row.querySelector('[name="disc_amt[]"]');
    DiscInput.value = discount.toFixed(2);

    // Recalculate net sale
    const allSubtotalInputs = document.querySelectorAll('[name="subtotal[]"]');
    let netSale = 0;
    allSubtotalInputs.forEach(subtotalInput => {
        const subtotalValue = parseFloat(subtotalInput.value);
        if (!isNaN(subtotalValue)) {
            netSale += subtotalValue;
        }
    });
    // Calculate and update net amount based on additional discount
    const additionalDiscountInput = document.querySelector('[name="additionalDiscount"]');
    const additionalDiscountValue = parseFloat(additionalDiscountInput.value) || 0;

    const netAmount = netSale - (netSale * (additionalDiscountValue / 100));

    const netSaleInput = document.querySelector('[name="netSale"]');
    const netAmountInput = document.querySelector('[name="netAmount"]');
    const changeInput = document.querySelector('[name="change"]');

    netSaleInput.value = netSale.toFixed(2);
    netAmountInput.value = netAmount.toFixed(2);

    // Calculate and update change amount

    const amountTenderedInput = document.querySelector('[name="amountTendered"]');
    const amountTenderedValue = parseFloat(amountTenderedInput.value) || 0;
    const change = amountTenderedValue - netAmount;
    changeInput.value = change.toFixed(2);
    $('input[name="change"]').change();
}
document.addEventListener("DOMContentLoaded", function () {
    addRow();

    const addRowButton = document.getElementById("addRow");
    addRowButton.addEventListener("click", function () {
        addRow();

        // Attach input listeners to the new row
        const newRow = document.querySelector('tbody tr:last-child');
        attachInputListeners(newRow);
    });

    // Attach input listeners to initial rows
    const initialRows = document.querySelectorAll('tbody tr:not([name="templateRow"])');
    initialRows.forEach(row => {
        attachInputListeners(row);
    });

    // Attach input listeners to additional discount and amount tendered input fields
    const additionalDiscountInput = document.querySelector('[name="additionalDiscount"]');
    if (additionalDiscountInput) {
        additionalDiscountInput.addEventListener("input", function () {
            CalculateValues(document.querySelector("table"));
        });
    }

    const amountTenderedInput = document.querySelector('[name="amountTendered"]');
    if (amountTenderedInput) {
        amountTenderedInput.addEventListener("input", function () {
            CalculateValues(document.querySelector("table"));
        });
    }
});

var now = new Date();
var year = now.getFullYear();
var month = String(now.getMonth() + 1).padStart(2, '0');
var day = String(now.getDate()).padStart(2, '0');
var formattedDate = year + '-' + month + '-' + day;
var hours = String(now.getHours()).padStart(2, '0');
var minutes = String(now.getMinutes()).padStart(2, '0');
var formattedTime = hours + ':' + minutes;
$("#dateAdmitted").val(formattedDate);
$("#timeAdmitted").val(formattedTime);