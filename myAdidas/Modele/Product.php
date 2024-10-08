<?php
require_once 'Framework/Modele.php';

class Product extends Modele {

    // Create a new product
    public function createProduct($productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity) {
        $sql = "INSERT INTO products (productName, price, category, type, targetAudience, possibleColors, images, collection, quantity)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $productName,
            $price,
            $category,
            $type,
            $targetAudience,
            json_encode($possibleColors), // Assuming this is an array
            json_encode($images), // Assuming this is an array
            $collection,
            $quantity
        ];
        $this->executerRequete($sql, $params);
    }

    // Get all products
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        return $this->executerRequete($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a product by its ID
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $params = [$id];
        $product = $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            $product['possibleColors'] = json_decode($product['possibleColors'], true);
            $product['images'] = json_decode($product['images'], true);
        }
        return $product;
    }

    // Update a product's details
    public function updateProduct($id, $productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity) {
        $sql = "UPDATE products SET productName=?, price=?, category=?, type=?, targetAudience=?, possibleColors=?, images=?, collection=?, quantity=? WHERE id=?";
        $params = [
            $productName,
            $price,
            $category,
            $type,
            $targetAudience,
            json_encode($possibleColors), // Store as JSON
            json_encode($images), // Store as JSON
            $collection,
            $quantity,
            $id
        ];
        $this->executerRequete($sql, $params);
    }

    // Delete a product
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $params = [$id];
        $this->executerRequete($sql, $params);
    }
}
?>
