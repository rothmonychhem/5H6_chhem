<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Product.php';
require_once 'Modele/Cart.php';

class ControleurProduct extends Controleur {

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
            $this->rediriger('Product', 'index'); 
        }
    }

    // Logic to add product to cart
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $this->requete->getParametre('productId');
            $quantity = $this->requete->getParametre('quantity');

            // Input validation
            if (isset($productId, $quantity) && is_numeric($quantity) && $quantity > 0) {
                $cartModel = new Cart(); 
                $cartModel->addProductToCart($this->requete->getSession()->getAttribut('user')['id'], $productId, $quantity);
           
                $this->rediriger('Cart', 'index');
            } else {
                
                $this->requete->getSession()->setAttribut('error', 'Invalid product ID or quantity.');
                $this->rediriger('Product', 'index'); 
            }
        }
    }

    // Logic to remove product from cart
    public function removeProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $this->requete->getParametre('productId');
            if ($productId) {
                $cartModel = new Cart(); 
                $cartModel->removeProductFromCart($this->requete->getSession()->getAttribut('user')['id'], $productId);
               
            }
            $this->rediriger('Cart', 'index'); 
        }
    }
}
?>
