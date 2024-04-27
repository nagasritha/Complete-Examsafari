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

const deleteButtons = document.querySelectorAll(".delete-btn"); 

if (editButtons) {
    editButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            id = this.getAttribute("data-service-id");
            card.style.display = "flex";
            console.log(id);
        });
    });
}

if (deleteButtons) {
    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            id = this.getAttribute("data-service-id");
            let formData = new FormData();
            formData.append("action","DELETION");
            formData.append("id",id);
            pushData(formData);
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

//service CRUED function
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
        if(result){
        result.textContent = data.message;
        }
        if(data.message == "Service Deleted"){
        
        location.reload();
        }
        console.log(result);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        alert("Error: " + error.message);
    });
}
//End of Service CRUED function

//FAQ section
let faqForm = document.getElementById("addQuestionForm");
let EditFaq = document.getElementById("editQuestionForm");
let deleteFaq = document.querySelectorAll(".faqDelete-btn");
console.log(deleteFaq);
if(faqForm){
    faqForm.addEventListener("submit",function(event){
        event.preventDefault();
        let formData = new FormData();
        formData.append("action","POST");
        formData.append("question",question.value);
        formData.append("answer",answer.value);
        pushFaq(formData);
    })
}

if(EditFaq){
    EditFaq.addEventListener("submit",function(event){
        event.preventDefault();
        let formData = new FormData();
        formData.append("action","PUT");
        formData.append("question",question.value);
        formData.append("answer",answer);
        formData.append("id",id);
        console.log(id);
        pushFaq(formData);
    })
}

if(deleteFaq){
    deleteFaq.forEach(function(button){
        button.addEventListener("click",function(){
            let id = this.getAttribute("data-service-id");
        let formData = new FormData();
        formData.append("action","DELETION");
        formData.append("id",id);
        pushFaq(formData);
        })
    });
}

function pushFaq(formData){
    fetch('../../assets/php/add_faq.php', {
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
        if(result){
        result.textContent = data.message;
        }
        if(data.success){
            if(data.message == "Service Deleted" || data.message=="Question Deleted" || data.message ==  "Question Updated" || data.message == "Service Updated"){
        
                location.reload();
                }
        }
       console.log(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        alert("Error: " + error.message);
    });
}
