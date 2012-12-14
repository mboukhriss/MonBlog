<?php
require_once 'Modele/Modele.php';
class ModeleBillet  extends Modele
{
    //Renvoie la liste des billets
    public function lireTout()
    {
        return $this->executerLecture('select * from T_BILLET order by BIL_ID desc');
    }
    
    //Renvoie un billet identifié
    public  function lireUnSeul($id)
    {
        return $this->executerLecture('select * from T_BILLET where BIL_ID=' . $id, true);
    }
}

?>
