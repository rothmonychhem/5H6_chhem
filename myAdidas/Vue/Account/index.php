<?php $this->titre = "MyAdidas - Connexion" ?>

<p>Veuillez vous connecter à votre compte</p>

<form action="Account/connecter" method="post">
    <input name="email" type="text" placeholder="Entrez votre courriel" required autofocus>
    <input name="password" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?= ($erreur == 'password') ? '<span>Login ou mot de passe incorrects</span>' : '' ?> 
