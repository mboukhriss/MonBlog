<?php

require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/Controleur.php';

class ControleurFrontal extends Controleur
{
    private $ctrlBillet;
    
    public function __construct() {
        $this->ctrlBillet = new ControleurBillet();
    }
    
    public function routerRequete()
    {
        try
        {
            if(!empty($_GET))
                $this->routerRequeteGet();
            else
                $this->ctrlBillet->listerBillets(); //action par défaut
        }
        catch (Exception $e)
        {
            $this->afficherErreur($e->getMessage());
        }
    }
    
    private function routerRequeteGet()
    {
        if(isset($_GET['action']))
        {
            if($_GET['action']=='afficherBillet')
            {
                if(isset($_GET['id']))
                {
                    $idBillet = intval($_GET['id']);
                    if($idBillet != 0)
                        $this->ctrlBillet->afficherBillet ($idBillet);
                    else
                    {
                        $id = strip_tags($_GET['id']);
                        throw new Exception("Identifiant de billet '$id' non valide");
                    }
                }
            }
            else
            {
                $action = strip_tags($GET['action']);
                throw new Exception("Action '$action' non valide");
            }
        }
        else
            throw new Exception("Aucune action définie");
    }
}