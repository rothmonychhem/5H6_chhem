<?php $this->titre = "MyAdidas - Connexion" ?>

<p>veuillez connecter a votre compte</p>

<form action="Accounts/connecter" method="post">
    <input name="courriel" type="text" placeholder="Entrez votre courriel" required autofocus>
    <input name="mdp" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?= ($erreur == 'mdp') ? '<span style="color : red;">Login ou mot de passe incorrects</span>' : '' ?> 
        
