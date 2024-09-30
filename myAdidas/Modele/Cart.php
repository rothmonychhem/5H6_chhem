<?php
require_once 'Framework/Modele.php';

class Cart extends Modele {

    public function createCart($total_price, $itemsSelected) {
        $sql = "INSERT INTO carts (total_price, itemsSelected) VALUES (?, ?)";
        $params = [$total_price, $itemsSelected];
        $this->executerRequete($sql, $params);
    }

    public function getCartById($id) {
        $sql = "SELECT * FROM carts WHERE id = ?";
        $params = [$id];
        return $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCart($id, $total_price, $itemsSelected) {
        $sql = "UPDATE carts SET total_price=?, itemsSelected=? WHERE id=?";
        $params = [$total_price, $itemsSelected, $id];
        $this->executerRequete($sql, $params);
    }
}
?>
