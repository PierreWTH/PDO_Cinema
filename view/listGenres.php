<?php ob_start(); ?>

<!-- Compter les genres -->
<div class = "entete">
<p class = "p-count"> Il y a <?= $requeteListGenres->rowCount() ?> genres 🗄 </p>

<!-- Ajouter un Genre-->

<button id="togg1">Ajouter un genre</button>
</div>
<form action = "index.php?action=addGenre" method = "post" class = "form-add-film" id="d1">
 
        <input type="text" name ="nomGenre" placeholder = "Nom du genre">
        
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

<!-- Tableau avec boucle pour afficher chaque genre -->
<div class = "table">
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
</div>

<?php

// Définition des variables utilisées dans template

$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres";
$contenu = ob_get_clean();
require "view/template.php";

?>