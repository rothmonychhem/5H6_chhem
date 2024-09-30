<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Transactions.php';

class TransactionsControleur extends Controleur {

    public function index() {
        $transactionModel = new Transactions();
        $transactions = $transactionModel->getUserTransactions($this->requete->getSession()->getAttribut('user')['id']); // Get user's transactions
        $this->genererVue(['transactions' => $transactions]);
    }

    public function processTransaction() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartId = $_POST['cartId'];
            $transactionModel = new Transactions();
            $transactionModel->createTransaction($this->requete->getSession()->getAttribut('user')['id'], $cartId);
            $this->rediriger('Transactions', 'index'); 
        }
    }
}
