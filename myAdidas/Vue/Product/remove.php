<?php>
public function remove() {
    // Check if the request is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productId = $_POST['productId'];
        $cartId = $_POST['cartId'];

        // Logic to remove the product from the cart in the database
        // Example: $this->cartModel->removeProduct($cartId, $productId);
        
        // Redirect or load a view confirming removal
    }
}

