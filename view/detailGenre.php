<?php ob_start();
$genreDetail = $requeteNomGenre->fetch()
?>

<!-- Boucle pour afficher chaque film de ce genre-->

<ul>
<?php
    foreach ($requeteDetailGenre-> fetchAll() as $genreFilm) { ?>

    <li><p><a href="index.php?action=detailFilm&id=<?=$genreFilm['id_film']?>"> <?=$genreFilm['titre']?></a></p></li>

    <?php } ?>
</ul>

<?php

// Définition des variables utilisées dans template

$titre = "Detail genre";
$titre_secondaire = "Détails du genre : ".$genreDetail['nom_genre'];
$contenu = ob_get_clean();
require "view/template.php";

?>