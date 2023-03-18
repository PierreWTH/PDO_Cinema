<?php

namespace Controller;
use Model\Connect;

class ActeurController 
{
    //Lister les Acteurs

    public function listActeurs() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListActeurs = $pdo->query("
        SELECT nom, prenom, date_naissance, sexe
        from personne p
        WHERE p.id_personne IN (SELECT a.id_personne FROM acteur a)
            ");
        
        require "view/listActeurs.php";
    }
    

}
?>