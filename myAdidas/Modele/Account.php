<?php

require_once 'Framework/Modele.php';

class Account extends Modele {

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $email The email
     * @param string $password The password
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "select id from utilisateurs where email = ? and password = ?";
        $account = $this->executerRequete($sql, array($email, $password));
        return ($account->rowCount() == 1);
    }

    /**
     * Renvoie un utilisateur existant dans la BD
     * 
     * @param string $email the email
     * @param string $password the password
     * @return mixed The account
     * @throws 
     */
    public function getAccount($email, $password)
    {
        $sql = "select id, name, password, email, likeItemCollection 
            from accounts where email = ? and password = ?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($account->rowCount() == 1)
            return $account->fetch(); 
        else
            throw new Exception("No such account exist");
    }

}

