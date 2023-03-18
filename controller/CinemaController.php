<?php

namespace Controller;
use Model\Connect;

class CinemaController 
{
    //Lister les films

    public function listFilms() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListFilms = $pdo->query("
        SELECT id_film, f.id_realisateur, titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') as duree_film, CONCAT(prenom, ' ', nom) as realisateur
        FROM film f
        INNER JOIN realisateur r on f.id_realisateur = r.id_realisateur
        INNER JOIN personne p on r.id_personne = p.id_personne
            ");
        
        require "view/listFilms.php";
    }

    // Lister les acteurs

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

    // Lister les réalisateurs

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

    // Lister les rôles

    public function listRoles() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListRoles = $pdo->query("
        SELECT CONCAT(p.prenom,  ' ', p.nom) as acteur, r.nom_role
        from casting c
        INNER JOIN role r on c.id_role = r.id_role
        INNER JOIN acteur a on c.id_acteur = a.id_acteur
        INNER JOIN personne p on a.id_personne = p.id_personne
        INNER JOIN film f on c.id_film = f.id_film
            ");
        
        require "view/listRoles.php";
    }

    // Détails d'un film

    public function detailFilm($id) 
    {
        $pdo = Connect::seConnecter();
        $requeteDetailFilm = $pdo->prepare("
        SELECT titre, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') as duree_film, annee_sortie, note 
        FROM film 
        WHERE id_film = :id ");
        $requeteDetailFilm->execute(["id" => $id]);
        require "view/detailFilm.php";
    }
   
    // Détail d'un réalisateur

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