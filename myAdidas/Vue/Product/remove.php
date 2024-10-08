<?php $this->titre = "MyAdidas - Supprimer du Panier"; ?>

<h1>Supprimer du Panier</h1>

<?php if (isset($product)) : ?>
    <p>Êtes-vous sûr de vouloir supprimer <strong><?= htmlspecialchars($product['productName']); ?></strong> de votre panier ?</p>

    <form action="Cart/remove" method="post"> <!-- Adjust the action to your cart handling -->
        <input type="hidden" name="productId" value="<?= $product['id'] ?>">
        <input type="hidden" name="cartId" value="<?= $cart['id'] ?>"> <!-- Assuming the cart ID is passed -->
        <button type="submit">Oui, Supprimer</button>
        <a href="Cart/index">Non, Retour au Panier</a>
    </form>
<?php else : ?>
    <p>Produit introuvable dans le panier.</p>
    <a href="Cart/index">Retour au Panier</a>
<?php endif; ?>
