<?php $titre = "Le Blogue du prof - " . $article['titre']; ?>

<article>
    <header>
        <a href="Adminarticles/modifier/<?= $article['id'] ?>"> [modifier l'article]</a><br>
        <h1 class="titreArticle"><?= $article['titre'] ?></h1>
        <time><?= $article['date'] ?></time>, par utilisateur #<?= $article['utilisateur_id'] ?>
        <h3 class=""><?= $article['sous_titre'] ?></h3>
    </header>
    <p><?= $article['texte'] ?></p>
    <p><?= $article['type'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $article['titre'] ?> :</h1>
</header>

<?php
foreach ($commentaires as $commentaire):
    ?>
    <?php if ($commentaire['efface'] == '0') : ?>
        <p><a href="Admincommentaires/confirmer/<?= $this->nettoyer($commentaire['id']) ?>" >
                [Effacer]</a>
            <?= $this->nettoyer($commentaire['date']) ?>, <?= $this->nettoyer($commentaire['auteur']) ?> dit : (privé? <?= $this->nettoyer($commentaire['prive']) ?>)<br/>
            <strong><?= $this->nettoyer($commentaire['titre']) ?></strong><br/>
            <?= $this->nettoyer($commentaire['texte']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="Admincommentaires/retablir/<?= $this->nettoyer($commentaire['id']) ?>" >
                [Rétablir]</a>
            Commentaire EFFACÉ du <?= $this->nettoyer($commentaire['date']) ?>, par <?= $this->nettoyer($commentaire['auteur']) ?> (privé? <?= $this->nettoyer($commentaire['prive']) ?>)
        </p>
    <?php endif; ?>
<?php endforeach; ?>

