<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Transaction.php';

class TransactionsControleur extends Controleur {

    // Display all transactions for the logged-in user
    public function index() {
        $transactionModel = new Transaction();
        $transactions = $transactionModel->getUserTransactions($this->requete->getSession()->getAttribut('user')['id']);
        $this->genererVue(['transactions' => $transactions]);
    }
    
    // Display a specific transaction by ID
    public function read($transactionId) {
        $transactionModel = new Transaction();
        $transaction = $transactionModel->getTransactionById($transactionId);
        if ($transaction) {
            $this->genererVue(['transaction' => $transaction]);
        } else {
           
            $this->rediriger('Transactions', 'index'); 
        }
    }

    // Validate a transaction
    public function validate($transactionId) {
        $transactionModel = new Transaction();
        $transactionModel->validateTransaction($transactionId);
        $this->rediriger('Transactions', 'index'); 
    }
}
?>
