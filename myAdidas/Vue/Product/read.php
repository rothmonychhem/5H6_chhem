<?php $this->titre = "MyAdidas - Détails du Produit"; ?>

<h1>Détails du Produit</h1>

<p><strong>Nom:</strong> <?= htmlspecialchars($product['productName']) ?></p>
<p><strong>Prix:</strong> <?= htmlspecialchars($product['price']) ?> €</p>
<p><strong>Catégorie:</strong> <?= htmlspecialchars($product['category']) ?></p>
<p><strong>Type:</strong> <?= htmlspecialchars($product['type']) ?></p>
<p><strong>Public cible:</strong> <?= htmlspecialchars($product['targetAudience']) ?></p>
<p><strong>Couleurs disponibles:</strong> <?= htmlspecialchars($product['possibleColors']) ?></p>
<p><strong>Collection:</strong> <?= htmlspecialchars($product['collection']) ?></p>
<p><strong>Quantité en stock:</strong> <?= htmlspecialchars($product['quantity']) ?></p>

<h2>Ajouter au Panier</h2>

<form action="Cart/add" method="post"> <!-- Adjust the action to your cart handling -->
    <input type="hidden" name="productId" value="<?= $product['id'] ?>">
    <label for="quantity">Quantité:</label>
    <input id="quantity" name="quantity" type="number" min="1" max="<?= $product['quantity'] ?>" required>
    <button type="submit">Ajouter au Panier</button>
</form>

<a href="Products/index">Retour à la liste des produits</a>
