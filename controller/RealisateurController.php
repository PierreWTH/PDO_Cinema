<?php

namespace Controller;
use Model\Connect;

class RealisateurController 
{
    //Lister les Réalisateurs

    public function listRealisateurs() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListRealisateurs = $pdo->query("
        SELECT CONCAT(prenom, ' ', nom) as identite, id_realisateur
        from personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        WHERE p.id_personne IN (SELECT r.id_personne FROM realisateur r)
            ");
        
        require "view/listRealisateurs.php";
    }

    public function detailRealisateur($id)
    {   
        // Identité d'un réalisateurs
        $pdo = Connect::seConnecter();
        $requeteDetailRealisateur = $pdo->prepare("
        SELECT CONCAT(prenom, ' ',nom) as identite, sexe,  DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_de_naissance
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        WHERE id_realisateur =  :id");
        $requeteDetailRealisateur->execute(["id" => $id]);
        
        // Films réalisés
        $pdo = Connect::seConnecter();
        $requeteFilmoRealisateur = $pdo->prepare("
        SELECT f.titre, id_film
        FROM film f
        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
        WHERE r.id_realisateur = :id");
        $requeteFilmoRealisateur->execute(["id" => $id]);
        require "view/detailRealisateur.php";

    }

    

}
?>