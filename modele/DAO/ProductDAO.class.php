<?php
/**
 * Description : DAO pour la classe produit de la BD onlineShop
 */

require_once(__DIR__ . "/DAO.interface.php");
require_once(__DIR__ . "/../product.class.php");
require_once(__DIR__ . "/connexionBD.class.php");

class ProductDAO implements DAO {

    /**
     * Trouve un produit par son ID
     */
    public static function findById(int $id): ?Product {
        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return null;

        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? new Product($result['id'], $result['name'], $result['price'], $result['image'], $result['category'], $result['description'], $result['quantity']) : null;
    }

    /**
     * Retourne tous les produits de la BD
     */
    public static function findAll(): array {
        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return [];

        $sql = "SELECT * FROM products";
        $stmt = $connexion->query($sql);
        $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product($row['id'], $row['name'], $row['price'], $row['image'], $row['category'], $row['description'], $row['quantity']);
        }

        return $products;
    }

    /**
     * Retourne les produits correspondant à un filtre (description)
     */
    public static function findByDescription(string $filter): array {
        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return [];

        $sql = "SELECT * FROM products WHERE description LIKE ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute(["%$filter%"]);
        $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product($row['id'], $row['name'], $row['price'], $row['image'], $row['category'], $row['description'], $row['quantity']);
        }

        return $products;
    }

    /**
     * Ajoute un nouveau produit dans la BD
     */
    public static function save(object $product): bool {
        if (!$product instanceof Product) return false;

        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return false;

        $sql = "INSERT INTO products (name, price, image, category, description, quantity) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($sql);
        return $stmt->execute([
            $product->getName(), 
            $product->getPrice(), 
            $product->getImage(), 
            $product->getCategory(), 
            $product->getDescription(), 
            $product->getQuantity()
        ]);
    }

    /**
     * Met à jour un produit existant
     */
    public static function update(object $product): bool {
        if (!$product instanceof Product) return false;

        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return false;

        $sql = "UPDATE products SET name = ?, price = ?, image = ?, category = ?, description = ?, quantity = ? WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        return $stmt->execute([
            $product->getName(), 
            $product->getPrice(), 
            $product->getImage(), 
            $product->getCategory(), 
            $product->getDescription(), 
            $product->getQuantity(), 
            $product->getId()
        ]);
    }

    /**
     * Supprime un produit de la BD
     */
    public static function delete(object $product): bool {
        if (!$product instanceof Product) return false;

        $connexion = ConnexionBD::getInstance();
        if (!$connexion) return false;

        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        return $stmt->execute([$product->getId()]);
    }

    /**
     * Retourne NULL pour findByEmail (spécifique à UserDAO)
     */
    public static function findByEmail(string $email): ?object {
        return null;
    }

    /**
     * Retourne FALSE pour existsByEmail (spécifique à UserDAO)
     */
    public static function existsByEmail(string $email): bool {
        return false;
    }
}
?>
