<?php
// Description : Classe qui génère les contrôleurs spécifiques
include_once("controleurs/controleurAccueilDefaut.class.php");
include_once("controleurs/controleurVoirPanier.class.php");
include_once("controleurs/controleurContact.class.php");
include_once("controleurs/controleurCommande.class.php");
include_once("controleurs/controleurConfirmation.class.php");
include_once("controleurs/controleurVoirProduits.class.php");

class ManufactureControleur {
    // Méthode qui crée une instance du contrôleur associé à l'action
    public static function creerControleur($action): Controleur {
        switch ($action) {
            case "voirPanier":
                return new VoirPanier();
            case "contact":
                return new Contact();
            case "commande":
                return new Commande();
            case "confirmation":
                return new Confirmation();
            case "voirProduits":
                return new VoirProduits(); // Ajout du contrôleur des produits
            default:
                return new AccueilDefaut();
        }
    }
}
?>
