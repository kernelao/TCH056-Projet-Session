
// script qui est utile pour la page du formulaire de commande.


$(document).ready(function () {
  
  // Validation du formulaire avec les differents criteres
  $( "#order-form" ).validate({
      rules: {
          firstname: {
              required : true,
              minlength: 2
          },   
          lastname: {
              required : true,
              minlength: 2
          },
          email: {
              required: true,
              email: true
          },
          phone: {
              required: true,
              phoneUS: true
          },
          creditcard: {
              required: true,
              creditcard: true
          },
          creditcardexpiry: {
              required: true,
              expiry: {
              }
          },
        },
    });
    
    // Validation de la date d'expiration de la carte de crédit avec regEx.
    jQuery.validator.addMethod("expiry", function(value, element) {
        return this.optional(element) || /^(0[1-9]|1[0-2])\/?([0-9]{2})$/.test(value);
    }, "La date d'expiration de votre carte de crédit est invalide");
}); 

// Fonction qui permet de stocker en localStorage la variable qui correspond au numéro
// de la commande. Ce chiffre augmente si le formulaire est valide donc seulement lorsque
// le "paiement" est effectué.
// Fonction pour gérer le numéro de commande
function nbOrder() {
    // Vérification et génération du numéro de commande
    var currentOrderNumber = localStorage.getItem("nbOrder");

    // Initialisation ou incrémentation du numéro de commande
    if (!currentOrderNumber) {
        currentOrderNumber = 1;
    } else {
        currentOrderNumber = parseInt(currentOrderNumber) + 1;
    }

    // Formatage du numéro de commande en 5 chiffres (ex : 00001, 00002)
    var formattedOrderNumber = String(currentOrderNumber).padStart(5, '0');

    // Enregistrement du numéro formaté avec la clé attendue
    localStorage.setItem("nbOrder", formattedOrderNumber);

    // Enregistrement du prénom et nom dans `localStorage`
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    localStorage.setItem("firstname", firstname);
    localStorage.setItem("lastname", lastname);

    // Suppression des items du panier
    localStorage.setItem("panier", 0);
    localStorage.removeItem("cart");

    // Retourne true pour permettre la soumission du formulaire
    return true;
}



