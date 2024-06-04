document.addEventListener("DOMContentLoaded", function () {
  // Fonction pour récupérer la valeur d'un paramètre dans l'URL
  function getParameterValue(parameterName) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(parameterName);
  }

  // Récupérer la valeur du paramètre "fournisseur" dans l'URL
  const nomFournisseur = getParameterValue("fournisseur");

  // Mettre à jour le champ du formulaire avec la valeur du fournisseur et le rendre non modifiable
  const fournisseurInput = document.getElementById("fournisseur");
  fournisseurInput.value = nomFournisseur;
  fournisseurInput.readOnly = true;
});
