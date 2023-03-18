<?php

namespace Controller;
use Model\Connect;

class RealisateurController 
{
    //Lister les Acteurs

    public function listRealisateurs() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListRealisateurs = $pdo->query("
        SELECT nom, prenom, DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_de_naissance, sexe
        from personne p
        WHERE p.id_personne IN (SELECT r.id_personne FROM realisateur r)
            ");
        
        require "view/listRealisateurs.php";
    }

    public function detailRealisateur($id)
    {
        $pdo = Connect::seConnecter();
        $requeteDetailRealisateur = $pdo->prepare("
        SELECT CONCAT(prenom, ' ',nom) as identite, sexe,  DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_de_naissance
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        WHERE id_realisateur =  :id");
        $requeteDetailRealisateur->execute(["id" => $id]);
        require "view/detailRealisateur.php";
    }

    

}
?>