<?php ob_start(); ?>

<p> Il y a <?= $requeteListRealisateurs->rowCount() ?> réalisateurs</p>

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
            foreach ($requeteListRealisateurs -> fetchAll() as $realisateur) { ?>
                <tr>
                    <td> <?= $realisateur["nom"] ?> </td>
                    <td> <?= $realisateur["prenom"] ?> </td>
                    <td> <?= $realisateur["date_de_naissance"] ?> </td>
                    <td> <?= $realisateur["sexe"] ?> </td>
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