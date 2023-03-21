<?php ob_start(); ?>


<?php

// Définition des variables utilisées dans template

$titre = "Acceuil";
$titre_secondaire = "Bienvenue sur PDO cinéma";
$contenu = ob_get_clean();
require "view/template.php";

?>