<?php ob_start();



?>



<ul>
<?php
    foreach ($requeteDetailRole-> fetchAll() as $role) { ?>

    <li><p><a href="index.php?action=detailActeur&id=<?=$role['id_acteur']?>"><?= $role["identite"]?></a> dans <a href="index.php?action=detailFilm&id=<?=$role['id_film']?>"><?= $role["titre"]?> </p></a></li>

    <?php } ?>
</ul>

<?php

$titre = "Détail des roles";
$titre_secondaire = "Liste des acteurs ayant incarné ce role";
$contenu = ob_get_clean();
require "view/template.php";

?>