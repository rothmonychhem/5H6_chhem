<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Cart.php';

class ControleurCart extends Controleur {

    // Display the cart for the logged-in user
    public function index() {
        $cartModel = new Cart();
        $userId = $this->requete->getSession()->getAttribut('user')['id'];
        $cart = $cartModel->getUserCart($userId);
        
        // Optional: Add error handling if cart retrieval fails
        if (!$cart) {
            $this->requete->getSession()->setAttribut('error', 'No cart found for the user.');
            $this->rediriger('SomeController', 'index'); // Redirect to an appropriate controller
        }
        
        $this->genererVue(['cart' => $cart]);
    }

    // Logic to add a product to the cart
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $this->requete->getParametre('productId');
            $quantity = $this->requete->getParametre('quantity');

         
            if (isset($productId, $quantity) && is_numeric($quantity) && $quantity > 0) {
                $cartModel = new Cart();
                $userId = $this->requete->getSession()->getAttribut('user')['id'];
                $cartModel->addProductToCart($userId, $productId, $quantity);
                $this->rediriger('Cart', 'index');
            } else {
              
                $this->requete->getSession()->setAttribut('error', 'Invalid product ID or quantity.');
                $this->rediriger('Cart', 'index');
            }
        }
    }

    // Logic to remove a product from the cart
    public function removeProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $this->requete->getParametre('productId');
            $cartModel = new Cart();
            $userId = $this->requete->getSession()->getAttribut('user')['id'];
            
            
            if ($productId) {
                $cartModel->removeProductFromCart($userId, $productId);
            }
            
            $this->rediriger('Cart', 'index'); 
        }
    }
}
?>
