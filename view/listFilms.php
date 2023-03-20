<?php ob_start(); ?>

<!-- Compter les films -->

<p class = "p-count"> Il y a <?= $requeteListFilms->rowCount() ?> films </p>

<!-- Ajouter un film -->

<button class ="add-film-button">Ajouter un film</button>

<form action = "index.php?action=addFilm" method = "POST" class = "form-add-film">
    <div class = "add-film">
        
        <input type="text" name ="titreFilm" id="titreFilm" placeholder = "Titre">
        
        <input type="text" name ="synopsisFilm" id="synopsisFilm" placeholder = "Synopsis">
       
        <input type="number" name ="anneeSortieFilm" id="anneeSortieFilm" placeholder = "Année de sortie">
        
        <input type="number" name ="dureeFilm" id="dureeFilm" placeholder = "Durée en minute">
        
        <input type="number" name = "noteFilm" id="noteFilm" placeholder = "Note">

        <!--Affichage liste des réalisteurs -->
        <select name="id_realisateurFilm" id="id_realisateurFilm" placeholder = "Nom du réalisateur">
            <option value="">Réalisateur</option>
            <?php
        foreach($requeteFormListReal->fetchAll() as $real){ ?>
        
        <option value="<?= $real["id_realisateur"] ?>"><?= $real["identite"] ?></option>
    <?php } ?>
          
        <input type="submit" name = "submit" value ="Ajouter">   
    </div>
</form>

<!-- Tableau avec boucle pour afficher chaque film -->

<table class="table-film">
    <thead class=>
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