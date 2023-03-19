<?php ob_start();

$acteurDetail = $requeteDetailActeur->fetch();

?>

<!-- Détail des acteurs -->

<p> Sexe : <?= $acteurDetail["sexe"] ?> <p>
<p> Date de naissance : <?= $acteurDetail["date_de_naissance"] ?> <p>


<h2>Filmographie</h2>

<!-- Boucle pour afficher chaque film de la filmographie-->

<ul>
<?php
    foreach ($requeteFilmographie-> fetchAll() as $film) { ?>

    <li><p><a href="index.php?action=detailFilm&id=<?=$film['id_film']?>"><?=$film['titre']?></a> (<?=$film['nom_role']?>)</p></li>

    <?php } ?>
</ul>

<?php

// Définition des variables utilisées dans template

$titre = $acteurDetail["identite"];

// Changement du titre secondaire en fonction du sexe
if ($acteurDetail['sexe'] == "Homme"){
    $titre_secondaire = "Détails de l'acteur : ".$acteurDetail["identite"];
}
else{
    $titre_secondaire = "Détails de l'actrice : ".$acteurDetail["identite"];
}
$contenu = ob_get_clean();
require "view/template.php";

?>