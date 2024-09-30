<?php $this->titre = "MyAdidas - Mon Panier"; ?>

<h1>Mon Panier</h1>

<?php if (empty($carts)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    <ul>
        <?php foreach ($carts as $cart): ?>
            <li>
                <p>Panier ID: <?= $cart['id'] ?> - Total: <?= $cart['total_price'] ?> €</p>
                <ul>
                    <?php foreach ($cart['items'] as $item): ?> <!-- Assuming $cart['items'] holds the product data -->
                        <li>
                            <?= htmlspecialchars($item['productName']) ?> - Prix: <?= htmlspecialchars($item['price']) ?> €
                            <a href="Products/remove/<?= $item['id'] ?>">Supprimer</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
