<?php ob_start();

$filmDetail = $requeteDetailFilm->fetch();
$realDetail = $requeteDetailReal->fetch();

?>

<h2> <?= $filmDetail["titre"]?> </h2>

<p> Réalisateur :<a href = "index.php?action=detailRealisateur&id=<?=$filmDetail['id_realisateur']?>"> <?= $realDetail['identite'] ?></a><p>
<p> Durée : <?= $filmDetail["duree_film"] ?> <p>
<p> Année de sortie : <?= $filmDetail["annee_sortie"] ?> <p>
<p> Genre : <?= $filmDetail["nom_genre"] ?> <p>

<p> Note : 

<?php 

// Boucle pour la notation

$note = $filmDetail['note'];

for ($i = 1; $i <= $note; $i++) {?>

    <i class="fa-solid fa-star"></i>

<?php } 

for ($i = $note - 5; $i < 0; $i++) {?>

    <i class="fa-regular fa-star"></i>

<?php } ?>

</p>

<h2>Synopsis</h2>

<p> <?= $filmDetail["synopsis"]?> </p>

<h2>Casting</h2>

<ul>
<?php
    foreach ($requeteDetailCasting-> fetchAll() as $casting) { ?>

    <li><p><a href="index.php?action=detailActeur&id=<?=$casting['id_acteur'] ?>"><?= $casting['identite']?></a> (<?=$casting['nom_role'] ?>) </p></li>

    <?php } ?>
</ul>

<?php

$titre = "Détail du film";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";

?>