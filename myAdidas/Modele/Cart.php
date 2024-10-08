<?php
require_once 'Framework/Modele.php';

class Cart extends Modele {

    public function createCart($userId, $total_price, $itemsSelected) {
        $sql = "INSERT INTO carts (user_id, total_price, itemsSelected) VALUES (?, ?, ?)";
        $params = [$userId, $total_price, $itemsSelected];
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
            
            // Check if the product is already in the cart
            if (array_key_exists($productId, $itemsSelected)) {
                $itemsSelected[$productId] += $quantity;
            } else {
                $itemsSelected[$productId] = $quantity;
            }

            // Fetch product details and update cart total price
            $productModel = new Product();
            $product = $productModel->getProductById($productId);
            $newTotalPrice = $cart['total_price'] + ($product['price'] * $quantity);
            
            // Update cart with new total price and selected items
            $this->updateCart($cart['id'], $newTotalPrice, json_encode($itemsSelected));
        } else {
            // If no cart exists, create a new cart
            $productModel = new Product();
            $product = $productModel->getProductById($productId);
            $totalPrice = $product['price'] * $quantity;
            $itemsSelected = [$productId => $quantity];

            // Create a new cart for the user
            $this->createCart($userId, $totalPrice, json_encode($itemsSelected));
        }
    }

    public function removeProductFromCart($userId, $productId) {
        $cart = $this->getUserCart($userId);

        if ($cart) {
            $itemsSelected = json_decode($cart['itemsSelected'], true);

            // Check if the product exists in the cart
            if (array_key_exists($productId, $itemsSelected)) {
                // Get product details to update total price
                $productModel = new Product();
                $product = $productModel->getProductById($productId);
                $priceToDeduct = $product['price'] * $itemsSelected[$productId];
                
                // Remove product from the selected items
                unset($itemsSelected[$productId]);

                // Update cart total price and items
                $newTotalPrice = $cart['total_price'] - $priceToDeduct;
                $this->updateCart($cart['id'], $newTotalPrice, json_encode($itemsSelected));
            }
        }
    }
}
?>
