<?php

require_once 'Modele/Cart.php';
require_once 'Framework/Vue.php';

class ControleurAdminCart extends Controleur {

  private $cart;

  public function __construct() {
    $this->cart = new Cart();
  }

  // Méthode index pour afficher la page d'administration des films
  public function index() {
    
    $cart = $this->cart->getCartbyId(1);
    $this->genererVue(array('films' => $cart));
  }
  
}