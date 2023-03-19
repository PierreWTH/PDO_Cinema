<?php ob_start(); ?>

<!-- Compter les réalisateurs -->

<p class = "p-count"> Il y a <?= $requeteListRealisateurs->rowCount() ?> réalisateurs</p>

<!-- Tableau avec boucle pour afficher chaque réalisateur -->

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

// Définition des variables utilisées dans template

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";

?>