<!-- Template de base pour toutes les pages -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css" class="css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?=$titre?></title>
</head>
<body>
    <header>
        <nav>
            <div class = "nav-logo">
                <p>PDO Cinema</p>
            </div>
            
            <div class = "nav-a">
                    <a href="index.php?action=listFilms">Films<a>
                    <a href="index.php?action=listActeurs">Acteurs<a>
                    <a href="index.php?action=listRealisateurs">Réalisateurs<a>
                    <a href="index.php?action=listRoles">Rôles<a>
                    <a href="index.php?action=listGenres">Genres<a>
            </div>
        </nav>
    </header>
    <div>
        <main>
            <div>
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>  
</body>
</html>