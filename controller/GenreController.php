<?php

namespace Controller;
use Model\Connect;

class GenreController 
{
    //Lister les genres

    public function listGenres() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListGenres = $pdo->query("
            SELECT nom_genre, id_genre
            from genre
            ");
        
        require "view/listGenres.php";
    }

    public function detailGenre($id)
    {   
        // Nom du genre
        $pdo = Connect::seConnecter();
        $requeteNomGenre = $pdo->prepare("
        SELECT g.id_genre, nom_genre
        FROM genre g
        WHERE g.id_genre = :id
        ");
        $requeteNomGenre->execute(["id" => $id]);


        // Films qui appartiennent a ce genre
        $pdo = Connect::seConnecter();
        $requeteDetailGenre = $pdo->prepare("
        SELECT g.id_genre, f.titre, nom_genre, f.id_film
        FROM genre g
        INNER JOIN appartenir a ON g.id_genre = a.id_genre
        INNER JOIN film f ON a.id_film = f.id_film
        WHERE g.id_genre = :id
        ");
        $requeteDetailGenre->execute(["id" => $id]);

        require "view/detailGenre.php";
    }

    public function addGenre()
    {

        if (isset($_POST['submit']))
        { 
        // Filtrage des données
        $pdo = Connect::seConnecter();

        $nomGenre= filter_input(INPUT_POST, "nomGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($$nomGenre)
        {
        $requeteAddGenre = $pdo->prepare("
        INSERT INTO genre (nom_genre)
            VALUES ( :nomGenre)
        ");
        $requeteAddGenre->execute(["nomGenre" => $nomGenre]);

        header("Location: index.php?action=listGenres");
        }
    
        }

    }












}
?>