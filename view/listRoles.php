<?php ob_start(); ?>

<p> Il y a <?= $requeteListRoles->rowCount() ?> rôles </p>

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

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";

?>