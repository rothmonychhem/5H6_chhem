<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Products.php';

class ProductsControleur extends Controleur {

    public function index() {
        $productModel = new Products();
        $products = $productModel->getAllProducts(); 
        $this->genererVue(['products' => $products]);
    }

    public function add() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];

            $cartModel = new Carts();
            $cartModel->addProductToCart($this->requete->getSession()->getAttribut('user')['id'], $productId, $quantity);
            $this->rediriger('Carts', 'index'); 
        }
    }

    public function read($productId) {
        $productModel = new Products();
        $product = $productModel->getProductById($productId); 
        $this->genererVue(['product' => $product]);
    }

    public function remove() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $cartModel = new Carts();
            $cartModel->removeProductFromCart($this->requete->getSession()->getAttribut('user')['id'], $productId);
            $this->rediriger('Carts', 'index'); 
        }
    }
}
