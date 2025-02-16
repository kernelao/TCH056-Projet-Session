<?php
/**
 * Description : DAO pour la classe utilisateur de la BD onlineShop
 */

require_once(__DIR__ . "/DAO.interface.php");
require_once(__DIR__ . "/../user.class.php");
require_once(__DIR__ . "/connexionBD.class.php");

class UserDAO implements DAO {

    /**
     * Trouve un utilisateur par son ID
     */
    public static function findById(int $id): ?User {
        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return null;

        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? new User($result['id'], $result['first_name'], $result['last_name'], $result['email'], $result['password'], $result['phone'], $result['address'], new Role($result['role_id'], "")) : null;
    }

    /**
     * Retourne tous les utilisateurs de la BD
     */
    public static function findAll(): array {
        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return [];

        $sql = "SELECT * FROM users";
        $stmt = $connexion->query($sql);
        $users = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['password'], $row['phone'], $row['address'], new Role($row['role_id'], ""));
        }

        return $users;
    }

    /**
     * Trouve un utilisateur par son email
     */
    public static function findByEmail(string $email): ?User {
        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return null;

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? new User($result['id'], $result['first_name'], $result['last_name'], $result['email'], $result['password'], $result['phone'], $result['address'], new Role($result['role_id'], "")) : null;
    }

    /**
     * Vérifie si un utilisateur existe par email
     */
    public static function existsByEmail(string $email): bool {
        return self::findByEmail($email) !== null;
    }

    /**
     * Insère un nouvel utilisateur
     */
    public static function save(object $user): bool {
        if (!$user instanceof User) return false;

        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return false;

        // Vérifier si le mot de passe est déjà haché
        $password = $user->getPassword();
        if (strlen($password) < 60) {
            $password = password_hash($password, PASSWORD_BCRYPT);
        }

        $sql = "INSERT INTO users (first_name, last_name, email, password, phone, address, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($sql);
        return $stmt->execute([
            $user->getFirstName(), 
            $user->getLastName(), 
            $user->getEmail(), 
            $password, 
            $user->getPhone(), 
            $user->getAddress(), 
            $user->getRole()->getId()
        ]);
    }

    /**
     * Met à jour un utilisateur existant
     */
    public static function update(object $user): bool {
        if (!$user instanceof User) return false;

        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return false;

        // Vérifier si le mot de passe est déjà haché
        $password = $user->getPassword();
        if (strlen($password) < 60) {
            $password = password_hash($password, PASSWORD_BCRYPT);
        }

        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, phone = ?, address = ?, role_id = ? WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        return $stmt->execute([
            $user->getFirstName(), 
            $user->getLastName(), 
            $user->getEmail(), 
            $password, 
            $user->getPhone(), 
            $user->getAddress(), 
            $user->getRole()->getId(),
            $user->getId()
        ]);
    }

    /**
     * Supprime un utilisateur
     */
    public static function delete(object $user): bool {
        if (!$user instanceof User) return false;

        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return false;

        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        return $stmt->execute([$user->getId()]);
    }

    /**
     * Retourne un tableau vide pour findByDescription (spécifique à ProductDAO)
     */
    public static function findByDescription(string $filter): array {
        return [];
    }
}
?>
