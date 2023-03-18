<?php ob_start();

$filmDetail = $requeteDetailFilm->fetch();
$realDetail = $requeteDetailReal->fetch();

?>

<h2> <?= $filmDetail["titre"]?> </h2>

<p> Réalisateur :<a href = "index.php?action=detailRealisateur&id=<?=$filmDetail['id_realisateur']?>"> <?= $realDetail['identite'] ?></a><p>
<p> Durée : <?= $filmDetail["duree_film"] ?> <p>
<p> Année de sortie : <?= $filmDetail["annee_sortie"] ?> <p>
<p> Note : </p>

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