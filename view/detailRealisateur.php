<?php ob_start();

$realisateurDetail = $requeteDetailRealisateur->fetch();

?>

<h2> <?= $realisateurDetail["identite"]?> </h2>

<p> Sexe : <?= $realisateurDetail["sexe"] ?> <p>
<p> Date de naissance : <?= $realisateurDetail["date_de_naissance"] ?> <p>


<?php

$titre = $realisateurDetail["identite"];
$titre_secondaire = "Détails du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";

?>