<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Carts.php';

class CartsControleur extends Controleur {

    public function index() {
        $cartModel = new Carts();
        $carts = $cartModel->getUserCarts($this->requete->getSession()->getAttribut('user')['id']); // Get user's carts
        $this->genererVue(['carts' => $carts]);
    }

    public function add() {
        // Logic to add product to cart
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];

            $cartModel = new Carts();
            $cartModel->addProductToCart($this->requete->getSession()->getAttribut('user')['id'], $productId, $quantity);
            $this->rediriger('Carts', 'index'); // Redirect to cart index
        }
    }

    public function remove() {
        // Logic to remove product from cart
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $cartModel = new Carts();
            $cartModel->removeProductFromCart($this->requete->getSession()->getAttribut('user')['id'], $productId);
            $this->rediriger('Carts', 'index'); // Redirect to cart index
        }
    }
}
