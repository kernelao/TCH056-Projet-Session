<!DOCTYPE html> 
<html lang="fr">

<head>
    <title>Tests pour la classe UserDAO</title>
    <meta charset="utf-8" />

    <style>
        body {
            background-color: #DDDDDD;
            margin: 0;
            display: flex;
            justify-content: center; /* Centre verticalement */
            align-items: center;    /* Centre horizontalement */
            height:225vh;          /* Utilise toute la hauteur de l'écran */
        }

        .container {
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            color: #333333;
        }

        table {
            border: 2px blue solid;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, td {
            padding: 10px 20px;
            text-align: center;
        }

        th {
            background-color: #4444CC;
            color: white;
            border: 2px black solid;
        }

        td {
            background-color: #DDDDFF;
            color: #000022;
            border: 2px black solid;
        }
    </style>
</head>

<body>
<div class="container"> 
    <h1>Tests pour la classe UserDAO</h1>

    <?php
    include_once("../../modele/user.class.php");
    include_once("../../modele/role.class.php");
    include_once("../../modele/DAO/userDAO.class.php");
    ?>

    <table>
        <thead>
            <tr>
                <th>Méthode</th>
                <th>Résultat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h2>Méthode findById</h2>
                </td>
                <td>
                    <?php
                    echo "<h3>Recherche de l'utilisateur avec l'ID 1 (existe):</h3>";
                    $unUser = UserDAO::findById(1);
                    echo "<ul><li>Utilisateur 1: " . ($unUser ? json_encode($unUser) : "n'existe pas") . "</li></ul>";

                    echo "<h3>Recherche de l'utilisateur avec l'ID 999 (n'existe pas):</h3>";
                    $unUser = UserDAO::findById(999);
                    echo "<ul><li>Utilisateur 999: " . ($unUser ? json_encode($unUser) : "n'existe pas") . "</li></ul>";
                    ?>
                </td>
            </tr>
            
            <tr>
                <td>
                    <h2>Méthode findAll</h2>
                </td>
                <td>
                    <?php
                    echo "<h3>Liste de tous les utilisateurs:</h3>";
                    $tabUsers = UserDAO::findAll();
                    echo "<ul>";
                    foreach ($tabUsers as $user) {
                        echo "<li>" . json_encode($user) . "</li>";
                    }
                    echo "</ul>";
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <h2>Méthode findByEmail</h2>
                </td>
                <td>
                    <?php
                    echo "<h3>Recherche de l'utilisateur avec l'email sophia.taylor@example.com (existe):</h3>";
                    $unUser = UserDAO::findByEmail("sophia.taylor@example.com");
                    echo "<ul><li>Utilisateur : " . ($unUser ? json_encode($unUser) : "n'existe pas") . "</li></ul>";

                    echo "<h3>Recherche de l'utilisateur avec l'email sophia999.taylor@example.com (n'existe pas):</h3>";
                    $unUser = UserDAO::findByEmail("sophia999.taylor@example.com");
                    echo "<ul><li>Utilisateur : " . ($unUser ? json_encode($unUser) : "n'existe pas") . "</li></ul>";
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <h2>Méthode existsByEmail</h2>
                </td>
                <td>
                    <?php
                    echo "<h3>Vérifie l'existance de l'email sophia.taylor@example.com (existe):</h3>";
                    $test = UserDAO::existsByEmail("sophia.taylor@example.com");
                    echo "<ul><li>L'email: " . ($test ? "existe déjà" : "n'existe pas") . "</li></ul>";

                    echo "<h3>Vérifie l'existance de l'email sophia999.taylor@example.com (n'existe pas):</h3>";
                    $test = UserDAO::existsByEmail("sophia999.taylor@example.com");
                    echo "<ul><li>L'email: " . ($test ? "existe" : "n'existe pas") . "</li></ul>";
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <h2>Méthode save</h2>
                </td>
                <td>
                    <?php
                    echo "<h3>Insertion d'un nouvel utilisateur :</h3>";
                    $role = new Role(3, "Customer");
                    $nouveauUser = new User(null, 'Test', 'User', 'test10.user@example.com', 'password123', '1234567890', '123 Test St', $role);
                    
                    $testSave = UserDAO::save($nouveauUser);
                    echo "<ul><li>Insertion : " . ($testSave ? "réussie" : "échouée") . "</li></ul>";
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <h2>Méthode update</h2>
                </td>
                <td>
                    <?php
                    $email = "test10.user@example.com";
                    $nouveauUser = UserDAO::findByEmail($email);

                    if ($nouveauUser !== null) {
                        echo "<h3>Modification de l'utilisateur authentifié :</h3>";
                        $nouveauUser->setFirstName('Updated');
                        $nouveauUser->setLastName('User Updated');
                        $nouveauUser->setPhone('9876543210');

                        $testUpdate = UserDAO::update($nouveauUser);
                        echo "<ul><li>Modification : " . ($testUpdate ? "réussie" : "échouée") . "</li></ul>";
                    } else {
                        echo "<h3>L'utilisateur avec l'email $email n'existe pas.</h3>";
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <h2>Méthode delete</h2>
                </td>
                <td>
                    <?php
                    $email = "test10.user@example.com";
                    $nouveauUser = UserDAO::findByEmail($email);

                    if ($nouveauUser !== null) {
                        echo "<h3>Suppression de l'utilisateur authentifié :</h3>";
                        $testDelete = UserDAO::delete($nouveauUser);
                        echo "<ul><li>Suppression : " . ($testDelete ? "réussie" : "échouée") . "</li></ul>";
                    } else {
                        echo "<h3>L'utilisateur avec l'email $email n'existe pas.</h3>";
                    }
                    ?>
                </td>
            </tr>

        </tbody>
    </table>
    <br />
</div>
</body>

</html>
