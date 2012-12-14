<?php

abstract class Modele {
    private $bdd;
    
    private function getBdd()
    {
        if($this->bdd === null)
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=monblog', 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd->query('set names utf8');
        }
        return $this->bdd;
    }
    
    protected function executerLecture($sql, $accederPremierElement = false)
    {
        $res = $this->getBdd()->query($sql);
        if($accederPremierElement = true)
            return $res->fetch();
        else
            return $res;
    }
}

?>
