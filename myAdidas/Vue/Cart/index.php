<?php $this->titre = "MyAdidas - Mon Panier"; ?>

<h1>Mon Panier</h1>

<?php if (empty($carts)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    <ul>
        <?php foreach ($carts as $cart): ?>
            <li>
                <a href="Cart/read/<?= $cart['id'] ?>">Voir le panier <?= $cart['id'] ?> - Total: <?= $cart['total_price'] ?> €</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
