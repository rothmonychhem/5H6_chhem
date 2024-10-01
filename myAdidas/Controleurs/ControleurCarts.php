<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Cart.php';

class CartsControleur extends Controleur {

    // Display the cart for the logged-in user
    public function index() {
        $cartModel = new Cart();
        $cart = $cartModel->getUserCart($this->requete->getSession()->getAttribut('user')['id']);
        $this->genererVue(['cart' => $cart]);
    }

    // Logic to add a product to the cart
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];

            $cartModel = new Cart();
            $cartModel->addProductToCart($this->requete->getSession()->getAttribut('user')['id'], $productId, $quantity);
            $this->rediriger('Carts', 'index');
        }
    }

    // Logic to remove a product from the cart
    public function remove() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $cartModel = new Cart();
            $cartModel->removeProductFromCart($this->requete->getSession()->getAttribut('user')['id'], $productId);
            $this->rediriger('Carts', 'index'); 
        }
    }
}
?>
