<?php
require_once 'Framework/Modele.php';

class Account extends Modele {

    public function createAccount($name, $password, $email) {
        $sql = "INSERT INTO accounts (name, password, email) VALUES (?, ?, ?)";
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Use password hashing
        $params = [$name, $hashedPassword, $email];
        $this->executerRequete($sql, $params);
    }

    public function getAccountByEmail($email) {
        $sql = "SELECT * FROM accounts WHERE email = ?";
        $params = [$email];
        return $this->executerRequete($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($email, $password) {
        $account = $this->getAccountByEmail($email);
        if ($account && password_verify($password, $account['password'])) {
            return $account;
        }
        return false;
    }

    /**
     * Vérifie qu'un utilisateur existe dans la BD
     * 
     * @param string $email Le login
     * @param string $password Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($email, $password)
    {
        $account = $this->getAccountByEmail($email);
        // Check if account exists and password matches
        if ($account && password_verify($password, $account['password'])) {
            return true; // Return true if password is correct
        }
        return false; // Otherwise return false
    }
}
?>
