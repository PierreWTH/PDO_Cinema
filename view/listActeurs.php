<?php ob_start(); ?>

<p> Il y a <?= $requeteListActeurs->rowCount() ?> acteurs </p>

<table>
    <thead>
        <tr>
            <th> NOM </th>
            <th> PRENOM </th>
            <th> DATE DE NAISSANCE</th>
            <th> SEXE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requeteListActeurs -> fetchAll() as $acteur) { ?>
                <tr>
                    <td> <?= $acteur["prenom"] ?> </td>
                    <td> <?= $acteur["nom"] ?> </td>
                    <td> <?= $acteur["date_naissance"] ?> </td>
                    <td> <?= $acteur["sexe"] ?> </td>
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