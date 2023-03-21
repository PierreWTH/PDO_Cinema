<?php ob_start(); ?>

<!-- Compter les genres -->

<p class = "p-count"> Il y a <?= $requeteListGenres->rowCount() ?> genres </p>

<!-- Ajouter un Genre-->

<form action = "index.php?action=addGenre" method = "post" class = "form-add-film">
 
        <input type="text" name ="nomGenre" placeholder = "Nom du genre">
        
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

<!-- Tableau avec boucle pour afficher chaque genre -->

<table>
    <thead>
        <tr>
            <th> GENRE </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requeteListGenres -> fetchAll() as $genre) { ?>
                <tr>
                    <td><a href="index.php?action=detailGenre&id=<?=$genre['id_genre']?>"><?= $genre["nom_genre"] ?></a></td>
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

// Définition des variables utilisées dans template

$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres";
$contenu = ob_get_clean();
require "view/template.php";

?>