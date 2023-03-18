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

    // Détails d'un film

    public function detailFilm($id) 
    {   
        // Requete infos films
        $pdo = Connect::seConnecter();
        $requeteDetailFilm = $pdo->prepare("
        SELECT titre, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') as duree_film, annee_sortie, note, id_realisateur 
        FROM film 
        WHERE id_film = :id ");
        $requeteDetailFilm->execute(["id" => $id]);

        // Requete nom réalisateur
        $pdo = Connect::seConnecter();
        $requeteDetailReal = $pdo->prepare("
        SELECT CONCAT(prenom,' ',nom) as identite
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        INNER JOIN film f on r.id_realisateur = f.id_realisateur
        WHERE id_film = :id ");
        $requeteDetailReal->execute(["id" => $id]);

        // Requete Casting
        $pdo = Connect::seConnecter();
        $requeteDetailCasting = $pdo->prepare("
        SELECT CONCAT(p.prenom,' ',p.nom) as identite, r.nom_role, a.id_acteur
        from casting c
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN role r ON c.id_role = r.id_role
        WHERE c.id_film = :id");
        $requeteDetailCasting->execute(["id" => $id]);

        require "view/detailFilm.php";
        
    }

}
?>