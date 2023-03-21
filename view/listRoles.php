<?php ob_start(); 

?>

<!-- Compter les rôles -->

<p class = "p-count"> Il y a <?= $requeteListRoles->rowCount() ?> rôles </p>

<!-- Ajouter un rôle-->

<button id="togg1">Ajouter un rôle</button>

<form action = "index.php?action=addRole" method = "post" class = "form-add-film" id="d1">
 
        <input type="text" name ="nomRole" placeholder = "Nom du role">
        
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

<!-- Tableau avec boucle pour afficher chaque rôle -->

<table>
    <thead>
        <tr>
            <th> ROLE </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requeteListRoles -> fetchAll() as $role) { ?>
                <tr>
                    <td><a href="index.php?action=detailRole&id=<?=$role['id_role']?>"><?= $role["nom_role"] ?> </td></a>
                    
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

// Définition des variables utilisées dans template

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";

?>