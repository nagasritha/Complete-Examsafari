// Add Service Form
const addServiceForm = document.getElementById("addserviceForm");
let result = document.getElementById('result');
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
            let formData = new FormData(this);
            formData.append("action", "PUT");
            formData.append("id", id);
            // Ensure that title, description, and icon elements are correctly selected here
            
            pushData(formData);
        });
    }

//service CRUED function
function pushData(formData) {
    
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
        console.log(data.message);

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
        let formData = new FormData(this);
        formData.append("action","PUT");
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
    let result = document.getElementById("result");
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

//Home Content
let HomeContentForm = document.getElementById("addHomeContentForm")
if(HomeContentForm){
    HomeContentForm.addEventListener("submit",function(event){
        event.preventDefault();
        let formData = new FormData(this);
        formData.append("action", "POST");
        pushHomeContent(formData);
    })

}

function pushHomeContent(formData){
    fetch('../../assets/php/add_home_content.php', {
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
          location.reload();
        }
       console.log(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        alert("Error: " + error.message);
    });
}

//Home banner section
let bannerForm = document.getElementById("addhomebannerForm");
let EditBanner = document.getElementById("edithomebannerForm");
let deleteBanner = document.querySelectorAll(".bannerDelete-btn");
console.log(deleteBanner);

if(bannerForm){
   
    bannerForm.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","POST");
        pushBanner(formData);
    })
}

if(EditBanner){
    EditBanner.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","PUT");
        formData.append("id",id);
        console.log(id);
        pushBanner(formData);
    })
}

if(deleteBanner){
    deleteBanner.forEach(function(button){
        button.addEventListener("click",function(){
            let id = this.getAttribute("data-service-id");
        let formData = new FormData();
        formData.append("action","DELETION");
        formData.append("id",id);
        pushBanner(formData);
        })
    });
}

function pushBanner(formData){
   console.log("Ia m called");
    fetch('../../assets/php/add_home_banner.php', {
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
            if(data.message == "Banner Deleted" || data.message ==  "Banner updated"){
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
//End of Home banner section



//trust section
let trustForm = document.getElementById("addtrustForm");
let EditTrust = document.getElementById("edittrustForm");
let deletetrust = document.querySelectorAll(".trustDelete-btn");


if(trustForm){
   
    trustForm.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","POST");
        pushTrust(formData);
    })
}

if(EditTrust){
    EditTrust.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","PUT");
        formData.append("id",id);
        console.log(id);
        pushTrust(formData);
    })
}

if(deletetrust){
    deletetrust.forEach(function(button){
        button.addEventListener("click",function(){
            let id = this.getAttribute("data-service-id");
        let formData = new FormData();
        formData.append("action","DELETION");
        formData.append("id",id);
        pushTrust(formData);
        })
    });
}

function pushTrust(formData){
   console.log("I am called");
    fetch('../../assets/php/add_trust.php', {
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
            if(data.message == "Trust Deleted" || data.message ==  "Trust updated"){
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
//End of Home trust section

//Booking section
let bookingForm = document.getElementById("addbookingForm");
let Editbooking = document.getElementById("editbookingForm");
let deletebooking = document.querySelectorAll(".bookingDelete-btn");


if(bookingForm){
   
    bookingForm.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","POST");
        pushBooking(formData);
    })
}

if(Editbooking){
    Editbooking.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","PUT");
        formData.append("id",id);
        console.log(id);
        pushBooking(formData);
    })
}

if(deletebooking){
    deletebooking.forEach(function(button){
        button.addEventListener("click",function(){
            let id = this.getAttribute("data-service-id");
        let formData = new FormData();
        formData.append("action","DELETION");
        formData.append("id",id);
        pushBooking(formData);
        })
    });
}

function pushBooking(formData){
   console.log("I am called");
    fetch('../../assets/php/add_booking_details.php', {
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
            if(data.message == "Booking Deleted" || data.message ==  "Booking updated"){
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
//End of Home trust section

//Booking section
let cityForm = document.getElementById("addcityForm");
let Editcity = document.getElementById("editcityForm");
let deleteCity = document.querySelectorAll(".cityDelete-btn");


if(cityForm){
   
    cityForm.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","POST");
        pushCity(formData);
    })
}

if(Editcity){
    Editcity.addEventListener("submit",function(event){
        event.preventDefault();
        console.log("called");
        let formData = new FormData(this);
        formData.append("action","PUT");
        formData.append("id",id);
        console.log(id);
        pushCity(formData);
    })
}

if(deleteCity){
    deleteCity.forEach(function(button){
        button.addEventListener("click",function(){
            let id = this.getAttribute("data-service-id");
        let formData = new FormData();
        formData.append("action","DELETION");
        formData.append("id",id);
        pushCity(formData);
        })
    });
}

function pushCity(formData){
   console.log("I am called");
    fetch('../../assets/php/add_exam_city.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log(response);
        if (!response.ok) {
            throw new Error("Network issue to fetch the data");
        } else {
            return response.text();
        }
    })
    .then(data => {
        /*if(result){
        result.textContent = data.message;
        }
        if(data.success){
            if(data.message == "Booking Deleted" || data.message ==  "Booking updated"){
        location.reload();
                }
        }*/
       console.log(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        alert("Error: " + error.message);
    });
}
//End of Exam city section