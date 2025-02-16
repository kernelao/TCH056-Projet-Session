<?php
// *****************************************************************************************
// Description   : classe contenant la fonction statique qui gère les contrôleurs spécifiques
// *****************************************************************************************
include_once("controleurs/controleurAccueilDefaut.class.php");
include_once("controleurs/controleurVoirPanier.class.php");
include_once("controleurs/controleurContact.class.php");
include_once("controleurs/controleurCommande.class.php");
include_once("controleurs/controleurConfirmation.class.php");
include_once("controleurs/controleurVoirProduits.class.php"); // Ajout du contrôleur VoirProduits

class ManufactureControleur {
    //  Méthode qui crée une instance du controleur associé à l'action
    //  et le retourne
    public static function creerControleur($action): Controleur {
        $controleur = null;
    
        if ($action == "voirPanier") {
            $controleur = new VoirPanier();
        } elseif ($action == "contact") {
            $controleur = new Contact();
        } elseif ($action == "commande") {
            $controleur = new Commande();
        } elseif ($action == "confirmation") {
            $controleur = new Confirmation();
        } elseif ($action == "voirProduits") { // Ajout de voirProduits
            $controleur = new VoirProduits();
        } else {
            $controleur = new AccueilDefaut();
        }

        return $controleur;
    }
}
?>
