<?php

require_once 'Modele/Cart.php';
require_once 'Modele/Transaction.php';
require_once 'Framework/Vue.php';

class ControleurAdminTransaction extends Controleur
{
    private $cart;
    private $transaction;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->transaction = new Transaction();
    }

  
    public function index()
    {
        $cartId = $this->requete->getParametre("id");
        $cart = $this->cart->getCartById($cartId);

       
        if ($cart) {
            $transaction = $this->transaction->getUserTransactions($cart['user_id']); 

            $this->genererVue(array(
                'cart' => $cart,
                'transactions' => $transaction 
            ));
        } else {
        
            $this->requete->getSession()->setAttribut('error', 'Cart not found.');
            $this->rediriger("someController", "index"); 
        }
    }

  
}

?>
