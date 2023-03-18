<?php ob_start();

$acteurDetail = $requeteDetailActeur->fetch();

?>

<h2> <?= $acteurDetail["identite"]?> </h2>

<p> Sexe : <?= $acteurDetail["sexe"] ?> <p>
<p> Date de naissance : <?= $acteurDetail["date_de_naissance"] ?> <p>


<h2>Filmographie</h2>

<ul>
<?php
    foreach ($requeteFilmographie-> fetchAll() as $film) { ?>

    <li><p><?=$film['titre']?> (<?=$film['nom_role']?>)</p></li>

    <?php } ?>
</ul>

<?php

$titre = $acteurDetail["identite"];
$titre_secondaire = "Détails de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";

?>