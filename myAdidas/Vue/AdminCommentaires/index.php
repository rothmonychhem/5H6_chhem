<?php $this->titre = "Le Blogue du prof - Commentaires" ?>

<header>
    <h1 id="titreReponses">Commentaires du Blogue du prof :</h1>
</header>
<?php
foreach ($commentaires as $commentaire):
    ?>
    <?php if ($commentaire['efface'] == '0') : ?>
        <p><a href="Admincommentaires/confirmer/<?= $this->nettoyer($commentaire['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($commentaire['date']) ?>, <?= $this->nettoyer($commentaire['auteur']) ?> dit : (privé? <?= $this->nettoyer($commentaire['prive']) ?>)<br/>
            <strong><?= $this->nettoyer($commentaire['titre']) ?></strong><br/>
            <?= $this->nettoyer($commentaire['texte']) ?><br />
            <a href="Adminarticles/lire/<?= $this->nettoyer($commentaire['article_id']) ?>" >
                [Voir l'article]</a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="Admincommentaires/retablir/<?= $this->nettoyer($commentaire['id']) ?>" >
                [Rétablir]</a>
            Commentaire du <?= $this->nettoyer($commentaire['date']) ?>, par <?= $this->nettoyer($commentaire['auteur']) ?> effacé! (privé? <?= $this->nettoyer($commentaire['prive']) ?>)
        </p>
    <?php endif; ?>
<?php endforeach; ?>