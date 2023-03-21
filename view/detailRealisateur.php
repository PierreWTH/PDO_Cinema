<?php ob_start();

$realisateurDetail = $requeteDetailRealisateur->fetch();

?>

<!-- Affichage des détails du réalisateur-->


<div class = "detail">

<img src="<?=$realisateurDetail['img_personne'] ?>" alt="photo du réalisateur" class="affiche-film">

<p> Sexe : <?= $realisateurDetail["sexe"] ?> <p>
<p> Date de naissance : <?= $realisateurDetail["date_de_naissance"] ?> <p>

<h2>Films réalisés</h2>

<!-- Boucle pour afficher chaque film réalisé-->

<ul>
<?php
    foreach ($requeteFilmoRealisateur-> fetchAll() as $filmoReal) { ?>

    <li><a href="index.php?action=detailFilm&id=<?=$filmoReal['id_film']?>"><p><?= $filmoReal['titre']?></p><a></li>

    <?php } ?>
</ul>

</div>
<?php

// Définition des variables utilisées dans template

$titre = $realisateurDetail["identite"];

// Changement du titre secondaire en fonction du sexe
if ($realisateurDetail['sexe'] == "Homme"){
    $titre_secondaire = "Détails du réalisateur : ".$realisateurDetail["identite"];
}
else{
    $titre_secondaire = "Détails de la réalisatrice : ".$realisateurDetail["identite"];
}

$contenu = ob_get_clean();
require "view/template.php";

?>