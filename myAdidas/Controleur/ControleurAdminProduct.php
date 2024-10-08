<?php

require_once 'Modele/Product.php';
require_once 'Framework/Vue.php';

class ControleurAdminProduct extends Controleur {

  private $product;

  public function __construct() {
    $this->product = new Product();
  }

  // Méthode index pour afficher la page d'administration des films
  public function index() {
    
    $films = $this->product->getAllProducts();
    $this->genererVue(array('films' => $films));
  }
  // Ajoute un nouveau product
  public function createProduct() {

    $productName = $this->requete->getParametre("productName");
    $annee = $this->requete->getParametre("annee");
    $genre = $this->requete->getParametre("genre");
    $price = $this->requete->getParametre("price");
    $category = $this->requete->getParametre("category");
    $type = $this->requete->getParametre("type");
    $targetAudience = $this->requete->getParametre("targetAudience");
    $possibleColors = $this->requete->getParametre("possibleColors");
    $images = $this->requete->getParametre("images");
    $collection = $this->requete->getParametre("collection");
    $quantity = $this->requete->getParametre("quantity");

    if ($productName && $annee && $genre && $price && $category && $type && $targetAudience && $possibleColors && $images && $collection && $quantity) {
      $this->product->createProduct($productName, $price, $category, $type, $targetAudience, $possibleColors, $images, $collection, $quantity);
      // Utilisation de la méthode rediriger pour la redirection
      $this->rediriger("adminProduct", "index");
    } else {
      throw new Exception("Tous les paramètres sont requis pour ajouter un product.");
    }
  }
}