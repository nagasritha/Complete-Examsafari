let enquireForm = document.getElementById("enquire-form");
console.log("Ia m called");
if(enquireForm){
    enquireForm.addEventListener("submit",function(event){
        event.preventDefault();
        let formData = new FormData(this);
        formData.append("action","POST");
        formData.append("admit_card",admit_card.value);
        let result = document.getElementById("result");
        fetch('assets/php/enquire_form.php', {
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
           console.log(data);
           if(result){
            result.textContent = data.message;
            if(data.success){
                result.classList.remove("text-danger");
                result.classList.add("text-success");
            }else{
                result.classList.remove("text-success");
                result.classList.add("text-danger");
            }
           }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            alert("Error: " + error.message);
        });
    })
}