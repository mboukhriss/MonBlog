<?php
require_once 'Modele/Modele.php';

class ModeleCommentaire extends Modele
{
    //Renvoie la liste des commentaires associés à un billet
    public function lire($idBillet)
    {
        return $this->executerLecture('select * from T_COMMENTAIRE where BIL_ID=' . $idBillet);
    }
}

?>
