<?php ob_start(); ?>

<!-- Compter les acteurs -->

<p class = "p-count"> Il y a <?= $requeteListActeurs->rowCount() ?> acteurs </p>

<!-- Ajouter un acteur -->

<button class ="add-film-button">Ajouter un acteur</button>

<form action = "index.php?action=addActeur" method = "post" class = "form-add-film">
 
        <input type="text" name ="prenomActeur" placeholder = "Prenom">
        
        <input type="text" name ="nomActeur"  placeholder = "Nom">
       
        <input type="text" name ="sexeActeur" placeholder = "Sexe">
        
        <input type="date" name ="dateNaissanceActeur" placeholder = "Date de Naissance">
          
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

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