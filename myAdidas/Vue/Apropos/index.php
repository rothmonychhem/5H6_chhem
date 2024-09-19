<?php $titre = 'À propos du Blogue du prof'; ?>

<ul>
    <li>André Pilon</li>

    <li>420-4A5 MO Web et Bases de données</li>
    <li>Hiver 2021, Collège Montmorency</li>
</ul>
<h3>Le Blogue du prof</h3>
<ul>
    <li>L'application "Le Blogue du prof" permet de composer et de
        diffuser des articles :</li>
    <ul>
        <li>sur des sujets reliés aux langages de programmation.</li>
    </ul>
    <li>La page d'Accueil présente la liste des titres des articles
        avec la date et l'auteur :</li>
    <li>On y retrouve un lien pour créer un nouvel article (seulement par un auteur en session) :</li>
    <ul>
        <li>La page de création d'un article offre de spécifier le sujet traité par
            l'article (type) par autocomplétion.<br>
        </li>
        <li>L'article peut être modifié (seulement par un auteur en session).<br>
        </li>

    </ul>
    <li>Les lecteurs du blogue peuvent cliquer sur le titre d'un
        article pour lire le texte complet de l'article :<br>
    </li>
    <ul>
        <li>À la suite du texte de l'article on offre la possibilité de
            laisser un commentaire sur l'article ;</li>
        <li>La personne qui veut laisser un commentaire doit
            s'identifier à l'aide d'un courriel valide :</li>
        <ul>
            <li>Un message est affiché si le courriel est invalide et le
                commentaire n'est pas enregistré.<br>
            </li>
        </ul>
        <li>On peut spécifier s'il s'agit d'un commentaire privé destiné
            seulement à l'auteur de l'article :</li>

        <li>Les commentaires peuvent (seulement par un auteur en session) :</li>
        <ul>
            <li>S'effacer après confirmation.</li>
            <li>Se rétablir si effacé.</li>
        </ul>
    </ul>
</ul>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application (v0.9.0.1) :</h4>
            <object data="Contenu/images/Blogue-vers-MVC-v1_0_0_0.svg" type="image/svg+xml" height="500" width="800">
                <img src="Contenu/images/blogue_phpmyadmin.jpg" alt=""/>
            </object><br/>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
            <a href="http://www.databaseanswers.org/data_models/big_data_hadoop/index.htm" >
                <img src="Contenu/images/data_model.gif" alt=""/><br/>
                Blog as a "Real Life example :</a>
        </td>
    </tr>
</table>