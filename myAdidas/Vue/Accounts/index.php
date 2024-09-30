<?php $this->titre = "MyAdidas - Connexion" ?>

<p>veuillez connecter a votre compte</p>

<form action="Accounts/connecter" method="post">
    <input name="email" type="text" placeholder="Entrez votre courriel" required autofocus>
    <input name="password" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?= ($erreur == 'password') ? '<span style="color : red;">Login ou mot de passe incorrects</span>' : '' ?> 
        
