<?php ob_start();

$roleDetail = $requeteNomRole->fetch();

?>

<!-- Boucle pour l'affichage de chaque acteur qui a joué le rôle -->
<div class = "detail">
<ul>
<?php
    foreach ($requeteDetailRole-> fetchAll() as $role) { ?>

    <li><p><a href="index.php?action=detailActeur&id=<?=$role['id_acteur']?>"><?= $role["identite"]?></a> dans <a href="index.php?action=detailFilm&id=<?=$role['id_film']?>"><?= $role["titre"]?> </p></a></li>

    <?php } ?>
</ul>
</div>
<?php

// Définition des variables utilisées dans template

$titre = "Détail des roles";
$titre_secondaire = "Acteur(s) ayant incarné ".$roleDetail['nom_role'];
$contenu = ob_get_clean();
require "view/template.php";

?>