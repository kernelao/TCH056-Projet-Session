<?php
// Description : Contrôleur pour afficher la liste des produits
include_once("controleurs/controleur.abstract.class.php");
include_once("modele/DAO/ProductDAO.class.php");

class VoirProduits extends Controleur {
    private $tableauProduits = [];

    public function __construct() {
        parent::__construct();
    }

    public function getTabProduits(): array {
        return $this->tableauProduits;
    }

    public function executerAction(): string {
        if (isset($_POST['description']) && !empty($_POST['description'])) {
            // Recherche de produit par description
            $this->tableauProduits = ProductDAO::findByDescription($_POST['description']);
        } else {
            // Récupération de tous les produits
            $this->tableauProduits = ProductDAO::findAll();
        }
        return "products.php";
    }
}
?>
