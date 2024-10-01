<?php

require_once 'Framework/Modele.php';

class Transaction extends Modele {

    // Create a new transaction
    public function createTransaction($account_id, $cart_id, $total_price) {
        $sql = "INSERT INTO transactions (account_id, cart_id, total_price) VALUES (?, ?, ?)";
        $params = [$account_id, $cart_id, $total_price];
        $this->executerRequete($sql, $params);
    }

    // Validate a transaction by ID
    public function validateTransaction($id) {
        $sql = "UPDATE transactions SET validation = TRUE WHERE id = ?";
        $params = [$id];
        $this->executerRequete($sql, $params);
    }

    // Get a transaction by ID
    public function getTransactionById($id) {
        $sql = "SELECT * FROM transactions WHERE id = ?";
        $params = [$id];
        return $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    // Get all transactions for a specific user
    public function getUserTransactions($account_id) {
        $sql = "SELECT * FROM transactions WHERE account_id = ?";
        $params = [$account_id];
        return $this->executerRequete($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
