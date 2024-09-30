<?php
require_once 'Framework/Modele.php';

class Product extends Modele {

    public function createProduct($productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity) {
        $sql = "INSERT INTO products (productName, price, category, type, targetAudience, possibleColors, images, collection, quantity)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity];
        $this->executerRequete($sql, $params);
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        return $this->executerRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $params = [$id];
        return $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity) {
        $sql = "UPDATE products SET productName=?, price=?, category=?, type=?, targetAudience=?, possibleColors=?, images=?, collection=?, quantity=? WHERE id=?";
        $params = [$productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity, $id];
        $this->executerRequete($sql, $params);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $params = [$id];
        $this->executerRequete($sql, $params);
    }
}
?>
