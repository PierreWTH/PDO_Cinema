<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name){
    include $class_name . 'php';
});

$ctrCinema = newController();

if(isset($GET["action"]))
{
    switch ($GET["action"]) {
        case "listFilms" : $ctrCinema -> listFilms(); break; 
        case "listActeurs" : $ctrCinema -> listActeurs(); break;
    }

    
}







?>