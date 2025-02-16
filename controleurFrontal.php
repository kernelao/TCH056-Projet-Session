<?php
    
    //Le contrôleur frontal reçoit la requête avec un paramètre lui indiquant l’action à accomplir. 	
    //Inclusion de la manufacture de controleur (qui importe déjà tous les contrôleurs)
    include_once "controleurs/manufactureControleur.class.php";
    
    //Obtenir le bon contrôleur
    //Si la requête contenant le paramètre action n'est pas renseignée
    if (!isset($_GET['action'])) {
        // on reste à la page d'accueil
        $action = "accueil";
    } else {
        // Sinon, on récupère l’action indiquée à accomplir
        $action = $_GET['action'];
    }

    //Créer une instance du contrôleur adapté 
    $controleur = ManufactureControleur::creerControleur($action);
    
    //Exécuter l'action et obtenir le nom de la vue
    $nomVue = $controleur->executerAction();

    //Inclure la bonne vue
    include_once("vues/" . $nomVue);
?>
