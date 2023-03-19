<?php ob_start(); ?>

<!-- Compter les acteurs -->

<p class = "p-count"> Il y a <?= $requeteListActeurs->rowCount() ?> acteurs </p>

<!-- Tableau avec boucle pour afficher chaque acteur-->

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

// Définition des variables utilisées dans template

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";

?>