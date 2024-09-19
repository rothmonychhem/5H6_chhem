<?php $this->titre = 'Le Blogue du prof'; ?>

<?php foreach ($articles as $article):
    ?>

    <article>
        <header>
            <a href="Articles/lire/<?= $article['id'] ?>">
                <h1 class="titreArticle"><?= $article['titre'] ?></h1>
            </a>
            <strong class=""><?= $article['sous_titre'] ?></strong>
            <time><?= $article['date'] ?></time>, par utilisateur #<?= $article['utilisateur_id'] ?>
        </header>
        <p><?= $article['texte'] ?><br/>
            <em><?= $article['type'] ?></em>
        </p>
    </article>
    <hr />
<?php endforeach; ?>    
