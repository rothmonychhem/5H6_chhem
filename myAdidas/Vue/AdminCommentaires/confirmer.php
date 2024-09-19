<?php $titre = "Supprimer - " . $commentaire['titre']; ?>

<article>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $commentaire['date'] ?>, <?= $commentaire['auteur'] ?> dit : (privé? <?= $commentaire['prive'] ?>)<br/>
        <strong><?= $commentaire['titre'] ?></strong><br/>
        <?= $commentaire['texte'] ?>
        </p>
    </header>
</article>

<form action="Admincommentaires/supprimer/<?= $commentaire['id'] ?>" method="post">
    <input type="submit" value="Oui" />
</form>
<form action="Adminarticles/lire/<?= $commentaire['article_id'] ?>" method="post" >
    <input type="submit" value="Annuler" />
</form>

