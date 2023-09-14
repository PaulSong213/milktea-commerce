// Function to show/hide the radio options based on the selected request type
function showRadioOptions(requestType) {
    var labRequest = document.getElementById("lab_request");
    var ultrasoundRequest = document.getElementById("ultrasound_request");
    var xrayRequest = document.getElementById("xray_request");

    if (requestType === "lab") {
        labRequest.style.display = "block";
        ultrasoundRequest.style.display = "none";
        xrayRequest.style.display = "none";
    } else if (requestType === "ultrasound") {
        labRequest.style.display = "none";
        ultrasoundRequest.style.display = "block";
        xrayRequest.style.display = "none";
    } else if (requestType === "xray") {
        labRequest.style.display = "none";
        ultrasoundRequest.style.display = "none";
        xrayRequest.style.display = "block";
    }
}

function addToServiceList(inputFieldId, dataList) {
    const inputField = document.getElementById(inputFieldId);
    const inputText = inputField.value.trim();

    if (inputText) {
        // Create a new table row
        const newRow = document.createElement("tr");
        newRow.innerHTML = `<td>${inputText}</td>`;
        // Append the new row to the services list table
        const servicesListTableBody = document.getElementById("services_list_body");
        servicesListTableBody.appendChild(newRow);
        // Clear the input field
        inputField.value = "";
        return false;
    }

    return true;
}

// Add an event listener to the "Add to list" buttons
document.getElementById("lab_add_to_list").addEventListener("click", function() {
    return addToServiceList("laboratory_input", "laboratorylist");
});

document.getElementById("ultrasound_add_to_list").addEventListener("click", function() {
    return addToServiceList("ultrasound_type", "ultrasoundlist");
});

document.getElementById("xray_add_to_list").addEventListener("click", function() {
    return addToServiceList("xray_body_part", "xraylist");
});