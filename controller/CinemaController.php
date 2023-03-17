<?php

namespace Controller;
use Model\Connect;

class CinemaController 
{
//lister les films

    public function listFilms() 
    {   
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') as duree_film, CONCAT(prenom, ' ', nom) as realisateur
        FROM film f
        INNER JOIN realisateur r on f.id_realisateur = r.id_realisateur
        INNER JOIN personne p on r.id_personne = p.id_personne
            ");
        
        require "view/listFilms.php";
    }

    public function listActeurs() 
    {   
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom, prenom, date_naissance, sexe
        from personne p
        WHERE p.id_personne IN (SELECT a.id_personne FROM acteur a)
            ");
        
        require "view/listActeurs.php";
    }

    public function listRealisateurs() 
    {   
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom, prenom, date_naissance, sexe
        from personne p
        WHERE p.id_personne IN (SELECT r.id_personne FROM realisateur r)
            ");
        
        require "view/listRealisateurs.php";
    }

    public function listRoles() 
    {   
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT CONCAT(p.prenom,  ' ', p.nom) as acteur, r.nom_role
        from casting c
        INNER JOIN role r on c.id_role = r.id_role
        INNER JOIN acteur a on c.id_acteur = a.id_acteur
        INNER JOIN personne p on a.id_personne = p.id_personne
        INNER JOIN film f on c.id_film = f.id_film
            ");
        
        require "view/listRoles.php";
    }

}


?>