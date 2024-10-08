<?php

require_once 'Requete.php';
require_once 'Vue.php';

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 * 
 * @version 1.0
 * @author Baptiste Pesquet
 */
abstract class Controleur {

    /** Action à réaliser */
    private $action;

    /** Requête entrante */
    protected $requete;

    /**
     * Définit la requête entrante
     * 
     * @param Requete $requete Requete entrante
     */
    public function setRequete(Requete $requete) {
        $this->requete = $requete;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     * 
     * @throws Exception Si l'action n'existe pas dans la classe Controleur courante
     */
    //modifier la méthode pour accepter un tableau de paramètres 
    public function executerAction($action, $params = array()) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            call_user_func_array(array($this, $this->action), $params);
        } else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }
    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     * 
     * @param array $donneesVue Données nécessaires pour la génération de la vue
     */
    protected function genererVue($donneesVue = array()) {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classeControleur);
        // Vérifier s'il y a un message à afficher
        $message = '';
        if ($this->requete->getSession()->existeAttribut("message")) {
            $message = $this->requete->getsession()->getAttribut("message");
            $this->requete->getsession()->setAttribut("message", ''); // on affiche le message une seule fois 
        }
        $donneesVue['message'] = $message;

        // Instanciation et génération de la vue
        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }

    /**
     * Effectue une redirection vers un contrôleur et une action spécifiques
     * 
     * @param string $controleur Contrôleur
     * @param type $action Action Action
     */
    protected function rediriger($controleur = null, $action = null) {
        $racineWeb = Configuration::get("racineWeb", "/");
        // Redirection vers l'URL /racine_site/controleur/action
        if ($controleur != null) {
            header("Location:" . $racineWeb . $controleur . "/" . $action);
        } else {
            header("Location:" . $racineWeb);
        }
    }

}
