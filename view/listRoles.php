<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> rôles </p>

<table>
    <thead>
        <tr>
            <th> ACTEUR</th>
            <th> ROLE </th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete -> fetchAll() as $film) { ?>
                <tr>
                    <td> <?= $film["acteur"] ?> </td>
                    <td> <?= $film["nom_role"] ?> </td>
                    
                <tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";

?>