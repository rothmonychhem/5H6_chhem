<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenu/css/style.css" />
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="#" class="lang-switch" data-locale="fr">Français</a> |
                <a href="#" class="lang-switch" data-locale="en">English</a> |

                <a href=""><h1 id="titre"><span data-i18n="myAdidas">myAdidas</span> v1.0.0.1</h1></a>
                <p>Version avec démarrage de session pour accès aux opérations de gestion</p>
                <a href="<?= $utilisateur != null ? 'Admin' : ''; ?>Commentaires">
                    
                </a>
                <a href="Apropos">
                    <h4>À propos</h4>
                </a>
                <a href="tests.php">
                    <h3>TESTS</h3>
                </a>
                <?php if (isset($account)) : ?>
                    <h3>Bonjour <?= $account['nom'] ?>,
                        <a href="Account/deconnecter"><small>[Se déconnecter]</small></a>
                    </h3>
                <?php else : ?>
                    <h3>[<a href="Account/index">Se connecter</a>] <small>(admin/admin)</small></h3>
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



