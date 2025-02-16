<?php
// *****************************************************************************************
// Description   : Contrôleur pour afficher la liste des produits
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
include_once("modele/DAO/ProductDAO.class.php");

class VoirProduits extends Controleur {
    private $tabProduits = [];

    public function __construct() {
        parent::__construct();
    }

    public function getTabProduits(): array {
        return $this->tabProduits;
    }

    public function executerAction(): string {
        if (isset($_POST['description']) && !empty($_POST['description'])) {
            $this->tabProduits = ProductDAO::findByDescription($_POST['description']);
        } else {
            $this->tabProduits = ProductDAO::findAll();
        }
        return "products.php"; // Affichage de la page des produits
    }
}
?>
