<!-- Template de base pour toutes les pages -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?=$titre?></title>
</head>
<body>
    <nav>
        <li>
            <a href="index.php?action=listFilms">Films<a></li>
            <a href="index.php?action=listActeurs">Acteurs<a></li>
            <a href="index.php?action=listRealisateurs">Réalisateurs<a></li>
            <a href="index.php?action=listRoles">Rôles<a></li>
            <a href="index.php?action=listGenres">Genres<a></li>
        </li>
    </nav>
    <div>
        <main>
            <div>
                <h1>PDO Cinema</h1>
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>






    </div>
</body>
</html>