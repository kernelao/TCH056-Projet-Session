<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour toutes les actions non-valides qui ramène à la
//                 page d'accueil
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");

class AccueilDefaut extends Controleur  {

    // ******************* Constructeur vide
    public function __construct() {
        parent::__construct();
    }

    // ******************* Méthode exécuter action
    public function executerAction(): string
    {
        return "index.php"; // Affichage de la page d'accueil
    }
}
?>
