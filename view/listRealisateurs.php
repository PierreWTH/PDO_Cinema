<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> réalisateurs</p>

<table>
    <thead>
        <tr>
            <th> PRENOM</th>
            <th> NOM</th>
            <th> DATE DE NAISSANCE</th>
            <th> SEXE </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete -> fetchAll() as $film) { ?>
                <tr>
                    <td> <?= $film["nom"] ?> </td>
                    <td> <?= $film["prenom"] ?> </td>
                    <td> <?= $film["date_naissance"] ?> </td>
                    <td> <?= $film["sexe"] ?> </td>
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