
<h1>Historique des Transactions</h1>

<?php if (empty($transactions)): ?>
    <p>Vous n'avez effectué aucune transaction.</p>
<?php else: ?>
    <ul>
        <?php foreach ($transactions as $transaction): ?>
            <li>
                Transaction ID: <?= $transaction['id'] ?> - Total: <?= $transaction['total_price'] ?> € - 
                Statut: <?= $transaction['validation'] ? 'Validée' : 'En attente' ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
