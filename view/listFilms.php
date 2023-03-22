<?php ob_start(); ?>

<!-- Compter les films -->
<div class = "entete">
<p class = "p-count"> Il y a <?= $requeteListFilms->rowCount() ?> films 🎥 </p> 

<!-- Ajouter un film -->

<button id="togg1">Ajouter un film</button>
<div id = "d1">
<form action = "index.php?action=addFilm" method = "post" class = "form-add-film">
        <div class = "input-film">
            <input type="text" name ="titreFilm" placeholder = "Titre">
            
            <input type="text" name ="synopsisFilm"  placeholder = "Synopsis">
        
            <input type="number" name ="anneeSortieFilm" placeholder = "Année de sortie">
            
            <input type="number" name ="dureeFilm" placeholder = "Durée en minute">
            
            <input type="number" name = "noteFilm" placeholder = "Note">

            <!--Affichage liste des réalisteurs -->
            <select name="id_realisateurFilm" placeholder = "Nom du réalisateur">
                <option value="">Réalisateur</option>
                <?php
            foreach($requeteFormListReal->fetchAll() as $real){ ?>
            
            <option value="<?= $real["id_realisateur"] ?>"><?= $real["identite"] ?></option>
        <?php } ?>
            </select>
        </div>

        <!--Affichage liste des genres -->
        
        
        <div class = "checkbox">   
            <?php
        foreach($requeteFormListGenre->fetchAll() as $genre){ ?>
        
        <div><input type="checkbox" value="<?= $genre["id_genre"] ?>" name="genreFilm[]" id="<?= $genre["id_genre"] ?>" placeholder = "Nom du genre" class = "checkbox-input"> 
        <label><?= $genre["nom_genre"] ?></label></div>
        
            <?php } ?>

        
        </div>
        <div>
        <input type="submit" name = "submit" value ="Ajouter"> 
        </div> 

          
         
</form>
</div>

<!-- Tableau avec boucle pour afficher chaque film -->
<div class = "table">
    <table class="table1">
        <thead class=>
            <tr>
                <th> TITRE </th>
                <th> ANNEE SORTIE </th>
                <th> REALISATEUR</th>
                <th>DUREE </th>
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
</div>

<?php

// Définition des variables utilisées dans template

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";

?>