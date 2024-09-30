<?php
require_once 'Framework/Modele.php';

class Transaction extends Modele {

    public function createTransaction($account_id, $cart_id, $total_price) {
        $sql = "INSERT INTO transactions (account_id, cart_id, total_price) VALUES (?, ?, ?)";
        $params = [$account_id, $cart_id, $total_price];
        $this->executerRequete($sql, $params);
    }

    public function validateTransaction($id) {
        $sql = "UPDATE transactions SET validation = TRUE WHERE id = ?";
        $params = [$id];
        $this->executerRequete($sql, $params);
    }

    public function getTransactionById($id) {
        $sql = "SELECT * FROM transactions WHERE id = ?";
        $params = [$id];
        return $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }
}
?>
