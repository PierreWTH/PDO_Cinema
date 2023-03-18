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
        SELECT CONCAT(prenom,' ',nom) as identite, date_naissance, sexe, a.id_acteur
        FROM personne p
        INNER join acteur a ON p.id_personne = a.id_personne
        WHERE p.id_personne IN (SELECT a.id_personne FROM acteur a)
            ");
        
        require "view/listActeurs.php";
    }

    public function detailActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requeteDetailActeur = $pdo->prepare("
        SELECT CONCAT(prenom,' ',nom) as identite, DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_de_naissance, sexe
        from personne p
        INNER JOIN acteur a on p.id_personne = a.id_personne
        WHERE a.id_acteur = :id");
        $requeteDetailActeur->execute(["id" => $id]);

        $pdo = Connect::seConnecter();
        $requeteFilmographie = $pdo->prepare("
        SELECT f.titre, nom_role
        from casting c 
        INNER JOIN role r on c.id_role = r.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne 
        INNER JOIN film f ON c.id_film = f.id_film
        WHERE a.id_acteur = :id");
        $requeteFilmographie->execute(["id" => $id]);
        
        require "view/detailActeur.php";

    }
    
}
?>