<?php

require_once 'Modele/Product.php';
require_once 'Framework/Vue.php';

class ControleurAdminProduct extends Controleur {

    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    // Method to display the product administration page
    public function index() {
        $products = $this->product->getAllProducts(); // Renamed to 'products'
        $this->genererVue(array('products' => $products));
    }

    // Add a new product
    public function createProduct() {
        $productName = $this->requete->getParametre("productName");
        $year = $this->requete->getParametre("year");
        $genre = $this->requete->getParametre("genre");
        $price = $this->requete->getParametre("price");
        $category = $this->requete->getParametre("category");
        $type = $this->requete->getParametre("type");
        $targetAudience = $this->requete->getParametre("targetAudience");
        $possibleColors = $this->requete->getParametre("possibleColors");
        $images = $this->requete->getParametre("images");
        $collection = $this->requete->getParametre("collection");
        $quantity = $this->requete->getParametre("quantity");

        // Validate parameters
        if ($productName && $year && $genre && $price && $category && $type && $targetAudience && $possibleColors && $images && $collection && $quantity) {
            $this->product->createProduct($productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity);
            $this->rediriger("adminProduct", "index");
        } else {
    
            $this->requete->getSession()->setAttribut('error', 'All fields are required to add a product.');
            $this->rediriger("adminProduct", "index");
        }
    }

    
}
?>
