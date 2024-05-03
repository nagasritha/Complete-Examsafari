// Get all radio buttons
const radioButtons = document.querySelectorAll('input[type="radio"]');

// Function to handle radio button click
function handleRadioButtonClick(event) {
  // Remove any existing continue buttons
  const existingContinueButtons = document.querySelectorAll(".continue-button");
  existingContinueButtons.forEach((button) => button.remove());

  //Create a new anchor element
  const anchorElement = document.createElement("a");
  anchorElement.href = "../charts/confirmPayment.html";

  // Create a new continue button
  const continueButton = document.createElement("button");
  continueButton.textContent = "Continue";
  continueButton.classList.add(
    "continue-button",
    "btn",
    "btn-warning",
    "mt-3",
    "ml-5",
    "text-white"
  );
  continueButton.style.width = "160px";
  continueButton.style.height = "40px";

  //Append the continue button to anchor element
  anchorElement.appendChild(continueButton);
  // Insert the continue button after the clicked radio button's container
  const optionContainer = event.target.closest(".option-container");
  if (optionContainer) {
    optionContainer.parentNode.insertBefore(
      anchorElement,
      optionContainer.nextSibling
    );
  }
}

// Add event listener to each radio button
radioButtons.forEach((radioButton) => {
  radioButton.addEventListener("click", handleRadioButtonClick);
});
