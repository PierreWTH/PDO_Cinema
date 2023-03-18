<?php ob_start();

$filmDetail = $requeteDetailFilm->fetch();

?>

<h2> <?= $filmDetail["titre"]?> </h2>

<p> Réalisateur : <p>
<p> Durée : <?= $filmDetail["duree_film"] ?> <p>
<p> Année de sortie : <?= $filmDetail["annee_sortie"] ?> <p>
<p> Note : </p>


<?php

$titre = "Détail du film";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";

?>