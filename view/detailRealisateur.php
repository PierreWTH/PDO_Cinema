<?php ob_start();

$realisateurDetail = $requeteDetailRealisateur->fetch();

?>

<h2> <?= $realisateurDetail["identite"]?> </h2>

<p> Sexe : <?= $realisateurDetail["sexe"] ?> <p>
<p> Date de naissance : <?= $realisateurDetail["date_de_naissance"] ?> <p>

<h2>Films réalisés</h2>

<ul>
<?php
    foreach ($requeteFilmoRealisateur-> fetchAll() as $filmoReal) { ?>

    <li><a href="index.php?action=detailFilm&id=<?=$filmoReal['id_film']?>"><p><?= $filmoReal['titre']?></p><a></li>

    <?php } ?>
</ul>

<?php

$titre = $realisateurDetail["identite"];
$titre_secondaire = "Détails du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";

?>