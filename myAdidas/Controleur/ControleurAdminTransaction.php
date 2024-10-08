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

  // Affiche les détails d'un cart et ses réservations
  public function index()
  {
    $idCart = $this->requete->getParametre("id");
    $cart = $this->cart->getCartById($idCart);
    $transaction = $this->transaction->getTransactionById($idCart);
    $this->genererVue(array(
      'cart' => $cart,
      'transaction' => $transaction
    ));
  }


}



?>