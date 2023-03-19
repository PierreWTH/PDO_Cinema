<?php ob_start(); ?>

<!-- Compter les films -->

<p> Il y a <?= $requeteListFilms->rowCount() ?> films </p>

<!-- Tableau avec boucle pour afficher chaque film -->

<table>
    <thead>
        <tr>
            <th> TITRE </th>
            <th> ANNEE SORTIE </th>
            <th> Réalisateur</th>
            <th> Durée  </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requeteListFilms -> fetchAll() as $film) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?=$film['id_film']?>"><?= $film["titre"] ?></a></td>
                    <td> <?= $film["annee_sortie"] ?> </td>
                    <td><a href="index.php?action=detailRealisateur&id=<?=$film['id_realisateur']?>"><?= $film["realisateur"] ?></a> </td>
                    <td> <?= $film["duree_film"] ?> </td>
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

// Définition des variables utilisées dans template

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";

?>