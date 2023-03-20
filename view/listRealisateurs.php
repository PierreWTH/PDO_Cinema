<?php ob_start(); ?>

<!-- Compter les réalisateurs -->

<p class = "p-count"> Il y a <?= $requeteListRealisateurs->rowCount() ?> réalisateurs</p>

<!-- Ajouter un film -->

<button class ="add-film-button">Ajouter un Réalisateur</button>

<form action = "index.php?action=addRealisateur" method = "post" class = "form-add-film">
 
        <input type="text" name ="prenomReal" placeholder = "Prenom">
        
        <input type="text" name ="nomReal"  placeholder = "Nom">
       
        <input type="text" name ="sexeReal" placeholder = "Sexe">
        
        <input type="date" name ="ageReal" placeholder = "Date de Naissance">
          
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

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