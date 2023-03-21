<?php ob_start(); ?>

<!-- COMPTER LES ACTEURS -->
<div class = "entete">
<p class = "p-count"> Il y a <?= $requeteListActeurs->rowCount() ?> acteurs 😎 </p>
</div>
<!-- Boutons d'ajout -->
<div class = "double-button">
<button id="togg1">Ajouter un acteur</button>
<button id = "togg2">Ajouter un casting</button>
</div>

<!-- AJOUTER UN ACTEUR -->

<form action = "index.php?action=addActeur" method = "post" class = "form-add-film" id="d1">
 
        <input type="text" name ="prenomActeur" placeholder = "Prenom">
        
        <input type="text" name ="nomActeur"  placeholder = "Nom">
       
        <input type="text" name ="sexeActeur" placeholder = "Sexe">
        
        <input type="date" name ="dateNaissanceActeur" placeholder = "Date de Naissance">
          
        <input type="submit" name = "submit" value ="Ajouter">   
</form>

<!-- AJOUTER UN CASTING-->


<!--Formulaire ajout casting -->
<form action = "index.php?action=addCasting" method = "post" class = "form-add-film" id="d2">

        <!--Affichage des films -->
        <select name="idFilm" placeholder = "Film">
            <option value="">Film</option>
            <?php
        foreach($requeteListFilmsCastingForm->fetchAll() as $film){ ?>
        
        <option value="<?= $film["id_film"] ?>"><?= $film["titre"] ?></option>
    <?php } ?>

        </select>

        <!--Affichage des acteurs -->
        <select name="idActeur" placeholder = "Acteur">
            <option value="">Acteur</option>
            <?php
        foreach($requeteListActeursCastingForm->fetchAll() as $acteur){ ?>
        
        <option value="<?= $acteur["id_acteur"] ?>"><?= $acteur["identite"] ?></option>
    <?php } ?>
          
        </select>

        <!--Affichage des roles -->
        <select name="idRole" placeholder = "Role">
            <option value="">Role</option>
            <?php
        foreach($requeteListRolesCastingForm->fetchAll() as $role){ ?>
        
        <option value="<?= $role["id_role"] ?>"><?= $role["nom_role"] ?></option>
    <?php } ?>
          
        </select>

          
        <input type="submit" name = "submit" value ="Ajouter">   
</form>


<!-- TABLEAU AVEC BOUCLE POUR AFFICHER CHAQUE ACTEUR-->
<div class = "table">
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
</div>

<?php

// DEFINITION DES VARIABLES UTILISÉES DANS TEMPLATE

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";

?>