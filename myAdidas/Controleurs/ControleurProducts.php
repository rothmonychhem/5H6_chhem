<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Product.php';
require_once 'Modele/Cart.php';

class ProductsControleur extends Controleur {

    // Display all products
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        $this->genererVue(['products' => $products]);
    }

    // Fetch a specific product's details
    public function read($productId) {
        $productModel = new Product();
        $product = $productModel->getProductById($productId);
        if ($product) {
            $this->genererVue(['product' => $product]);
        } else {
            $this->rediriger('Products', 'index');
        }
    }

    // Logic to add product to cart
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];

            $cartModel = new Cart(); 
            $cartModel->addProductToCart($this->requete->getSession()->getAttribut('user')['id'], $productId, $quantity);
            $this->rediriger('Carts', 'index');
        }
    }

    // Logic to remove product from cart
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
