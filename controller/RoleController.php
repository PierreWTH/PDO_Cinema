<?php

namespace Controller;
use Model\Connect;

class RoleController 
{
    //Lister les Acteurs

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
}
?>