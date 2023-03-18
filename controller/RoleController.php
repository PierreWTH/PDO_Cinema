<?php

namespace Controller;
use Model\Connect;

class RoleController 
{
    //Lister les Roles

    public function listRoles() 
    {   
        
        $pdo = Connect::seConnecter();
        $requeteListRoles = $pdo->query("
        SELECT r.nom_role, r.id_role
        from casting c
        INNER JOIN role r on c.id_role = r.id_role
        INNER JOIN acteur a on c.id_acteur = a.id_acteur
        INNER JOIN personne p on a.id_personne = p.id_personne
        INNER JOIN film f on c.id_film = f.id_film
        GROUP BY r.id_role
            ");
        
        require "view/listRoles.php";
    }

    public function detailRole($id)
    {
        $pdo = Connect::seConnecter();
        $requeteDetailRole = $pdo->prepare("
        SELECT CONCAT(p.prenom, ' ', p.nom) as identite, f.titre, a.id_acteur, f.id_film
        FROM casting c 
        INNER JOIN film f ON c.id_film = f.id_film
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        WHERE id_role = :id
        GROUP BY a.id_acteur, f.id_film
        ");
        $requeteDetailRole->execute(["id" => $id]);

        require "view/detailRole.php";
    }
}
?>