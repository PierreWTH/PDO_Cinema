<?php

// Définition des controllers utilisés

use Controller\CinemaController;
use Controller\ActeurController;
use Controller\RealisateurController;
use Controller\RoleController;

// Chargement automatique des classes

spl_autoload_register(function ($class_name){
    require str_replace("\\","/", $class_name) . ".php";
});

// Définition des instances

$ctrlCinema = new CinemaController();
$ctrlActeur = new ActeurController();
$ctrlRealisateur = new RealisateurController();
$ctrlRole = new RoleController();

// Définition de l'id

$id = (isset($_GET["id"])) ? $_GET["id"] : null ;

// Traitement des différents retours de action

if(isset($_GET["action"]))
{
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlCinema -> listFilms(); break; 
        case "detailFilm" : $ctrlCinema -> detailFilm($id); break;

        case "listActeurs" : $ctrlActeur -> listActeurs(); break;
        case "detailActeur" : $ctrlActeur-> detailActeur($id); break;

        case "listRealisateurs" : $ctrlRealisateur -> listRealisateurs(); break;
        case "detailRealisateur" : $ctrlRealisateur-> detailRealisateur($id); break;

        case "listRoles" : $ctrlRole -> listRoles(); break;
        case "detailRole" : $ctrlRole-> detailRole($id); break;
    
    }

}


?>