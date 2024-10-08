<?php

require_once 'Modele/Cart.php';
require_once 'Framework/Vue.php';

class ControleurAdminCart extends Controleur {

    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    public function index($cartId = 1) { 
        $cart = $this->cart->getCartById($cartId);

        if ($cart) {
            $this->genererVue(array('cart' => $cart)); 
        } else {
   
            $this->genererVue(array('erreur' => 'Cart not found.'));
        }
    }
    

}
?>
