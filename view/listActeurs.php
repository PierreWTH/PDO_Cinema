<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> acteurs </p>

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
            foreach ($requete -> fetchAll() as $film) { ?>
                <tr>
                    <td> <?= $film["prenom"] ?> </td>
                    <td> <?= $film["nom"] ?> </td>
                    <td> <?= $film["date_naissance"] ?> </td>
                    <td> <?= $film["sexe"] ?> </td>
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