<?php $this->titre = "MyAdidas - Ajouter au Panier"; ?>

<h1>Ajouter au Panier</h1>

<p>Choisissez la quantité de <?= htmlspecialchars($product['productName']) ?> que vous souhaitez ajouter :</p>

<form action="Carts/add" method="post"> <!-- Adjust the action to your cart handling -->
    <input type="hidden" name="productId" value="<?= $product['id'] ?>">
    <label for="quantity">Quantité:</label>
    <input id="quantity" name="quantity" type="number" min="1" required>
    <button type="submit">Ajouter au Panier</button>
</form>

<a href="Products/index">Retour à la liste des produits</a>
