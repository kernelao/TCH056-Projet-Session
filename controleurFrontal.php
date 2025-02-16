<?php
// Activer l'affichage des erreurs pour débogage (à désactiver en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion de la manufacture de contrôleurs (qui importe déjà tous les contrôleurs)
include_once "controleurs/manufactureControleur.class.php";

// Vérifier si une action est définie dans l'URL
$action = isset($_GET['action']) ? $_GET['action'] : "accueil";

// Créer une instance du contrôleur correspondant
$controleur = ManufactureControleur::creerControleur($action);

// Vérifier si le contrôleur a été correctement instancié
if (!$controleur) {
    die("Erreur : Aucun contrôleur trouvé pour l'action '$action'");
}

// Exécuter l'action et obtenir le nom de la vue à charger
$nomVue = $controleur->executerAction();

// Vérifier si la vue existe avant de l'inclure
$cheminVue = "vues/" . $nomVue;
if (!file_exists($cheminVue)) {
    die("Erreur : La vue '$nomVue' n'existe pas !");
}

// Inclure la bonne vue
include_once($cheminVue);
?>
