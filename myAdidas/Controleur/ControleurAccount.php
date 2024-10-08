<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Account.php';


abstract class ControleurAccount extends Controleur {

    private $account;

    public function executerAction($action , $params = array()) {
       
        if ($this->requete->getSession()->existeAttribut("account")){
            $this->account = $this->requete->getSession()->getAttribut("account");
            parent::executerAction($action);
        } else {
            $this->rediriger('Account');
        }
    }

    public function genererVue($donneesVue = array()) {
        
        $donneesVue['account'] = $this->account;
        parent::genererVue($donneesVue);
    }

    public function __construct() {
        $this->account = new Account();
    }

    public function index() {
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $this->genererVue(['erreur' => $erreur]);
    }

    public function connecter() {
        if ($this->requete->existeParametre("email") && $this->requete->existeParametre("password")) {
            $email = $this->requete->getParametre("email");
            $password = $this->requete->getParametre("password");
            if ($this->account->connecter($email, $password)) {
                $account = $this->account->getAccountByEmail($email, $password);
                $this->requete->getSession()->setAttribut("account", $account);
             
                if ($this->requete->getSession()->existeAttribut('erreur')) {
                    $this->requete->getsession()->setAttribut('erreur', '');
                }
                $this->rediriger("AdminProduct");
            } else {
                $this->requete->getSession()->setAttribut('erreur', 'password');
                $this->rediriger('Account');
            }
        } else
            throw new Exception("Action impossible : email ou mot de passe non défini");
    }

    public function deconnecter() {
        $this->requete->getSession()->detruire();
        $this->rediriger("");
    }

}
