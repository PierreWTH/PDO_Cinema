<?php ob_start(); ?>

<p> Il y a <?= $requeteListActeurs->rowCount() ?> acteurs </p>

<table>
    <thead>
        <tr>
            <th> ACTEUR </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requeteListActeurs -> fetchAll() as $acteur) { ?>
                <tr>
                    <td><a href="index.php?action=detailActeur&id=<?=$acteur['id_acteur'] ?>"><?= $acteur["identite"] ?> </td></a>
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";

?>