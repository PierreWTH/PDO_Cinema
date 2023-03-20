<?php

namespace Controller;
use Model\Connect;

class CinemaController 
{
    //Lister les films

    public function listFilms() 
    {   
        //Lister les films
        $pdo = Connect::seConnecter();
        $requeteListFilms = $pdo->query("
        SELECT id_film, f.id_realisateur, titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') as duree_film, CONCAT(prenom, ' ', nom) as realisateur
        FROM film f
        INNER JOIN realisateur r on f.id_realisateur = r.id_realisateur
        INNER JOIN personne p on r.id_personne = p.id_personne
        ORDER BY annee_sortie DESC
            ");
        
        // Lister les reals pour le formulaire
        $pdo = Connect::seConnecter();
        $requeteFormListReal = $pdo->query("
        SELECT CONCAT(prenom,' ',nom) as identite, id_realisateur
        FROM realisateur r
        INNER JOIN personne p ON r.id_personne = p.id_personne;
            ");

        // Lister les genres pour le formulaire
        $pdo = Connect::seConnecter();
        $requeteFormListGenre = $pdo->query("
        SELECT nom_genre, id_genre
        FROM genre;
        
            ");
        
        require "view/listFilms.php";
    }

    // Détails d'un film

    public function detailFilm($id) 
    {   
        // Afficher infos films
        $pdo = Connect::seConnecter();
        $requeteDetailFilm = $pdo->prepare("
        SELECT titre, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') as duree_film, annee_sortie, note, synopsis, note, id_realisateur, nom_genre
        FROM film f
        INNER JOIN appartenir a ON f.id_film = a.id_film
        INNER JOIN genre g ON a.id_genre = g.id_genre
        WHERE f.id_film = :id ");
        $requeteDetailFilm->execute(["id" => $id]);

        // Afficher nom prénom réalisateur
        $pdo = Connect::seConnecter();
        $requeteDetailReal = $pdo->prepare("
        SELECT CONCAT(prenom,' ',nom) as identite
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        INNER JOIN film f on r.id_realisateur = f.id_realisateur
        WHERE id_film = :id ");
        $requeteDetailReal->execute(["id" => $id]);

        // Afficher le Casting
        $pdo = Connect::seConnecter();
        $requeteDetailCasting = $pdo->prepare("
        SELECT CONCAT(p.prenom,' ',p.nom) as identite, r.nom_role, a.id_acteur
        from casting c
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN role r ON c.id_role = r.id_role
        WHERE c.id_film = :id
        ORDER BY identite");
        $requeteDetailCasting->execute(["id" => $id]);

        require "view/detailFilm.php";
        
    }

    public function addFilm()
    {

        if (isset($_POST["submit"]))
        {
            // Filtrage des données
            $pdo = Connect::seConnecter();
            
            $titreFilm = filter_input(INPUT_POST, "titreFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $synopsisFilm = filter_input(INPUT_POST, "synopsisFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $anneeSortieFilm = filter_input(INPUT_POST, "anneeSortieFilm", FILTER_VALIDATE_INT);
            $dureeFilm = filter_input(INPUT_POST, "dureeFilm", FILTER_VALIDATE_INT);
            $noteFilm = filter_input(INPUT_POST, "noteFilm", FILTER_VALIDATE_INT);
            $realisateurFilm =  filter_input(INPUT_POST, "id_realisateurFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            
            $requeteAddFilm = $pdo->prepare("
            INSERT INTO film (titre, synopsis, annee_sortie, duree, note, id_realisateur)
                VALUES ( :titreFilm, :synopsisFilm, :anneeSortieFilm, :dureeFilm, :noteFilm, :realisateurFilm)
            ");
            $requeteAddFilm->execute(["titreFilm" => $titreFilm, "synopsisFilm" => $synopsisFilm, "anneeSortieFilm" => $anneeSortieFilm , "dureeFilm" => $dureeFilm, "noteFilm" => $noteFilm, "realisateurFilm" => $realisateurFilm,]);
            
            require "view/listFilms.php";
        }

    }



}
?>