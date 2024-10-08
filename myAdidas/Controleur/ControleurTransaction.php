<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Transaction.php';

class ControleurTransaction extends Controleur {

    // Display all transactions for the logged-in user
    public function index() {
        $transactionModel = new Transaction();
        $userId = $this->requete->getSession()->getAttribut('user')['id'];
        $transactions = $transactionModel->getUserTransactions($userId);
        $this->genererVue(['transactions' => $transactions]); // Changed 'transaction' to 'transactions'
    }
    
    // Display a specific transaction by ID
    public function read($transactionId) {
        $transactionModel = new Transaction();
        if (is_numeric($transactionId)) { // Validate transactionId
            $transaction = $transactionModel->getTransactionById($transactionId);
            if ($transaction) {
                $this->genererVue(['transaction' => $transaction]);
            } else {
                // Optionally set an error message for the session
                $this->requete->getSession()->setAttribut('error', 'Transaction not found.');
                $this->rediriger('Transaction', 'index'); 
            }
        } else {
            $this->requete->getSession()->setAttribut('error', 'Invalid transaction ID.');
            $this->rediriger('Transaction', 'index'); 
        }
    }

    // Validate a transaction
    public function validate($transactionId) {
        if (is_numeric($transactionId)) { 
            $transactionModel = new Transaction();
            $transactionModel->validateTransaction($transactionId);
            $this->requete->getSession()->setAttribut('success', 'Transaction validated successfully.');
        } else {
            $this->requete->getSession()->setAttribut('error', 'Invalid transaction ID.');
        }
        $this->rediriger('Transaction', 'index'); 
    }
}
?>
