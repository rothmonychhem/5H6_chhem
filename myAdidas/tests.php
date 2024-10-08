
<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modelAccount') {
        require 'Tests/Modeles/ModeleAccount.php';
    } elseif ($_GET['test'] == 'modeleProduct') {
        require 'Tests/Modeles/ModeleProduct.php';
    } elseif ($_GET['test'] == 'erreur') {
        require 'Tests/Vues/Erreur.php';
    } elseif ($_GET['test'] == 'products') {
        require 'Tests/Vues/Products.php';
    } elseif ($_GET['test'] == 'transactions') {
        require 'Tests/Vues/Transactions.php';
    }
}
?>

<a href="index.php">Retourner et arrêter les tests</a>

<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modelProduct">Test pour modelProduit</a>
    </li>
    <li>
        <a href="tests.php?test=modelAccount">Test pour modelAccount</a>
    </li>
</ul>

<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=erreur">Test pour la vue d'erreur</a>
    </li>
    <li>
        <a href="tests.php?test=product">Test pour la vue de produit</a>
    </li>
    <li>
        <a href="tests.php?test=transaction">Test pour la vue de transaction </a>
    </li>
</ul>