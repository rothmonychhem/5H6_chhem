<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenu/css/style.css" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="#" class="lang-switch" data-locale="fr">Français</a> |
                <a href="#" class="lang-switch" data-locale="en">English</a> |
                <a href="#" class="lang-switch" data-locale="ru">Русский</a>

                <a href=""><h1 id="titreBlog"><span data-i18n="BlogueProf">Le Blogue du prof</span> v1.0.0.1</h1></a>
                <p>Version avec démarrage de session pour accès aux opérations de gestion</p>
                <a href="<?= $utilisateur != null ? 'Admin' : ''; ?>Commentaires">
                    <h4>Afficher tous les commentaires de tous les articles</h4>
                </a>
                <a href="Apropos">
                    <h4>À propos</h4>
                </a>
                <a href="tests.php">
                    <h3>TESTS</h3>
                </a>
                <?php if (isset($utilisateur)) : ?>
                    <h3>Bonjour <?= $utilisateur['nom'] ?>,
                        <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
                    </h3>
                <?php else : ?>
                    <h3>[<a href="Utilisateurs/index">Se connecter</a>] <small>(admin/admin)</small></h3>
                <?php endif; ?>
            </header>
            <div id="contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <script src="Contenu/js/autocompleteType.js"></script>
        <script src="Contenu/jquery.i18n/src/CLDRPluralRuleParser.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.messagestore.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.fallbacks.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.language.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.parser.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.bidi.js"></script>
        <script src="Contenu/i18n/main-jquery_i18n.js"></script>
    </body>
</html>



