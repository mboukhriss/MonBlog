<?php
require_once 'Modele/ModeleBillet.php';
require_once 'Modele/ModeleCommentaire.php';

require_once 'Controleur/Controleur.php';

class ControleurBillet extends Controleur
{
    private $modeleBillet;
    private $modeleCommentaire;
    
    public function __construct()
    {
        $this->modeleBillet = new ModeleBillet();
        $this->modeleCommentaire = new ModeleCommentaire();
    }
    
    public function listerBillets()
    {
        $billets = $this->modeleBillet->lireTout();
        $lienBillet = "index.php?action=afficherBillet&id=";
        $this->genererVue('listeBillets', 
                array('billets'=>$billets, 'lienBillet'=>$lienBillet));
    }
    
    public function afficherBillet($id)
    {
        $billet = $this->modeleBillet->lireUnSeul($id);
        $commentaires = $this->modeleCommentaire->lire($id);
        $this->genererVue('detailBillet', 
                array('billet'=>$billet, 'commentaires'=>$commentaires));
    }
}

?>
