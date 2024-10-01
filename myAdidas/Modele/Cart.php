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

    public function getUserCart($userId) {
        $sql = "SELECT * FROM carts WHERE user_id = ?";
        $params = [$userId];
        return $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function addProductToCart($userId, $productId, $quantity) {
        $cart = $this->getUserCart($userId);

        if ($cart) {
            $itemsSelected = json_decode($cart['itemsSelected'], true);
            if (array_key_exists($productId, $itemsSelected)) {
                $itemsSelected[$productId] += $quantity;
            } else {
                $itemsSelected[$productId] = $quantity;
            }

            $productModel = new Product();
            $product = $productModel->getProductById($productId);
            $newTotalPrice = $cart['total_price'] + ($product['price'] * $quantity);
            $this->updateCart($cart['id'], $newTotalPrice, json_encode($itemsSelected));
        } else {
            $productModel = new Product();
            $product = $productModel->getProductById($productId);
            $totalPrice = $product['price'] * $quantity;
            $itemsSelected = [$productId => $quantity];
            $this->createCart($totalPrice, json_encode($itemsSelected));
        }
    }

    public function removeProductFromCart($userId, $productId) {
        $cart = $this->getUserCart($userId);

        if ($cart) {
            $itemsSelected = json_decode($cart['itemsSelected'], true);
            if (array_key_exists($productId, $itemsSelected)) {
                $productModel = new Product();
                $product = $productModel->getProductById($productId);
                $priceToDeduct = $product['price'] * $itemsSelected[$productId];
                unset($itemsSelected[$productId]);
                $newTotalPrice = $cart['total_price'] - $priceToDeduct;
                $this->updateCart($cart['id'], $newTotalPrice, json_encode($itemsSelected));
            }
        }
    }
}
?>
