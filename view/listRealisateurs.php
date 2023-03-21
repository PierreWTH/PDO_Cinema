<?php ob_start(); ?>

<!-- Compter les réalisateurs -->
<div class = "entete">
<p class = "p-count"> Il y a <?= $requeteListRealisateurs->rowCount() ?> réalisateurs 🎬 </p>

<!-- Ajouter un Réalisateur  -->

<button id="togg1">Ajouter un Réalisateur</button>
</div>

<form action = "index.php?action=addRealisateur" method = "post" class = "form-add-film" id="d1">
 
        <input type="text" name ="prenomReal" placeholder = "Prenom">
        
        <input type="text" name ="nomReal"  placeholder = "Nom">
       
        <input type="text" name ="sexeReal" placeholder = "Sexe">
        
        <input type="date" name ="dateNaissanceReal" placeholder = "Date de Naissance">
          
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

<!-- Tableau avec boucle pour afficher chaque réalisateur -->
<div class = "table">
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
</div>
<?php

// Définition des variables utilisées dans template

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";

?>