// Add Service Form
const addServiceForm = document.getElementById("addserviceForm");
if (addServiceForm) {
    addServiceForm.addEventListener("submit", function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        formData.append("action", "POST");
        pushData(formData);
    });
}

// Edit Service Form
const editButtons = document.querySelectorAll(".edit-btn");
const editServiceForm = document.getElementById('editServiceForm');
let card = document.getElementById("service-Edit-card");
let cancelCard = document.getElementById("close-service-Edit-card");
let id;

if (editButtons) {
    editButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            id = this.getAttribute("data-service-id");
            card.style.display = "flex";
            console.log(id);
        });
    });
}

if (cancelCard) {
    cancelCard.addEventListener("click", function() {
        card.style.display = "none";
    });
}


    if (editServiceForm) {
        editServiceForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            let formData = new FormData();
            formData.append("action", "PUT");
            formData.append("id", id);
            // Ensure that title, description, and icon elements are correctly selected here
            formData.append("title", title.value);
            formData.append("description", description.value);
            formData.append("icon", icon.value);
            pushData(formData);
        });
    }


function pushData(formData) {
    console.log(formData);
    let result = document.getElementById("result");
    fetch('../../assets/php/add_service.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log(response);
        if (!response.ok) {
            throw new Error("Network issue to fetch the data");
        } else {
            return response.json();
        }
    })
    .then(data => {
        result.textContent = data.message;
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        alert("Error: " + error.message);
    });
}
