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
        ORDER BY identite
            ");
        
        require "view/listActeurs.php";
    }

    // Détail d'un acteur

    public function detailActeur($id)
    {   
        // Identité
        $pdo = Connect::seConnecter();
        $requeteDetailActeur = $pdo->prepare("
        SELECT CONCAT(prenom,' ',nom) as identite, DATE_FORMAT(date_naissance, '%d/%m/%Y') as date_de_naissance, sexe
        from personne p
        INNER JOIN acteur a on p.id_personne = a.id_personne
        WHERE a.id_acteur = :id");
        $requeteDetailActeur->execute(["id" => $id]);

        // Filmographie
        $pdo = Connect::seConnecter();
        $requeteFilmographie = $pdo->prepare("
        SELECT f.titre, nom_role, f.id_film
        from casting c 
        INNER JOIN role r on c.id_role = r.id_role
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne 
        INNER JOIN film f ON c.id_film = f.id_film
        WHERE a.id_acteur = :id");
        $requeteFilmographie->execute(["id" => $id]);
        
        require "view/detailActeur.php";

    }
    
    public function addActeur()
    {
        if (isset($_POST['submit']))
        { 
            // Filtrage des données
            $pdo = Connect::seConnecter();

            $prenomActeur = filter_input(INPUT_POST, "prenomActeur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nomActeur = filter_input(INPUT_POST, "nomActeur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sexeActeur= filter_input(INPUT_POST, "sexeActeur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateNaissanceActeur= filter_input(INPUT_POST, "dateNaissanceActeur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $requeteAddPersonneActeur = $pdo->prepare("
            INSERT INTO personne (nom, prenom, sexe, date_naissance)
                VALUES ( :nomActeur, :prenomActeur, :sexeActeur, :dateNaissanceActeur)
            ");
            $requeteAddPersonneActeur->execute(["nomActeur" => $nomActeur, "prenomActeur" => $prenomActeur, "sexeActeur" => $sexeActeur , "dateNaissanceActeur" => $dateNaissanceActeur]);
            
            // On récupère le dernier ID rentré dans la BDD
            $idActeur = $pdo -> lastInsertId();

            $requeteAddActeur= $pdo->prepare("
            INSERT INTO acteur (id_personne)
            VALUES (:id)
            ");
            $requeteAddActeur->execute(["id"=> $idActeur]);
            
        }

        header("Location: index.php?action=listActeurs");
    }
}
?>