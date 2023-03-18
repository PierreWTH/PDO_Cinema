<?php ob_start(); ?>

<p> Il y a <?= $requeteListRealisateurs->rowCount() ?> réalisateurs</p>

<table>
    <thead>
        <tr>
            <th> REALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requeteListRealisateurs -> fetchAll() as $realisateur) { ?>
                <tr>
                    <td><a href = "index.php?action=detailRealisateur&id=<?=$realisateur['id_realisateur']?>"><?= $realisateur["identite"] ?> </td><a>
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";

?>