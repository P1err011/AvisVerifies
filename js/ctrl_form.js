// Function to control form inputs
function control() {
  // Select form elements
  const clientInput = document.getElementById("client");
  const fournisseurInput = document.getElementById("fournisseur");
  const prestationInput = document.getElementById("prestation");
  const texteInput = document.getElementById("texte");

  // Add event listeners for form fields
  clientInput.addEventListener("blur", surfaceValidation);
  fournisseurInput.addEventListener("blur", surfaceValidation);
  prestationInput.addEventListener("blur", surfaceValidation);
  texteInput.addEventListener("blur", surfaceValidation);
}

// Function for surface validation
function surfaceValidation(event) {
  const input = event.target;
  const value = input.value.trim(); // Remove leading and trailing spaces from the input value
  const errorElement = document.getElementById(input.id + "-error");

  if (input.id === "client") {
    // Validate client name
    if (!isValidClientName(value)) {
      input.classList.add("error");
      errorElement.textContent = "Le nom du client n'est pas valide";
    } else {
      input.classList.remove("error");
      errorElement.textContent = "";
    }
  } else if (input.id === "fournisseur") {
    // Validate supplier domain name
    if (!isValidDomainName(value)) {
      input.classList.add("error");
      errorElement.textContent = "Le nom de domaine n'est pas valide";
    } else {
      input.classList.remove("error");
      errorElement.textContent = "";
    }
  } else {
    // Validate other fields
    if (value === "") {
      input.classList.add("error");
      errorElement.textContent = "Ce champ est obligatoire";
    } else {
      input.classList.remove("error");
      errorElement.textContent = "";
    }
  }
}

// Function to validate client name
function isValidClientName(name) {
    // Add your client name validation logic here (e.g., using regular expressions)
    return /^[a-zA-ZÀ-ÿ\s'-]{2,49}$/.test(name);
}
  
// Function to validate domain name
function isValidDomainName(domain) {
    // Add your domain name validation logic here
    // For example, you can check if the domain has the correct format, if it contains a valid TLD, etc.
    return /^[a-zA-Z0-9-]{1,63}(\.[a-zA-Z]{2,})+$/.test(domain);
}

// Add event listener when the DOM content is loaded
window.addEventListener("DOMContentLoaded", control);


