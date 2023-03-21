<!-- Template de base pour toutes les pages -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css" class="css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./public/js/function.js" defer></script>
    <title><?=$titre?></title>
</head>
<body>
    <nav>
        <div class = "nav-logo">
            <a href="index.php">PDO Cinema</a>
        </div>
        
        <div class = "nav-a">
            
                <a href="index.php?action=listFilms">Films<a>
                <a href="index.php?action=listActeurs">Acteurs<a>
                <a href="index.php?action=listRealisateurs">Réalisateurs<a>
                <a href="index.php?action=listRoles">Rôles<a>
                <a href="index.php?action=listGenres">Genres<a>
        </div>
    </nav>
    <div class="topnav">
        <a href="#home" class="active">PDO Cinéma</a>
  <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
        <a href="index.php?action=listFilms">Films<a>
        <a href="index.php?action=listActeurs">Acteurs<a>
        <a href="index.php?action=listRealisateurs">Réalisateurs<a>
        <a href="index.php?action=listRoles">Rôles<a>
        <a href="index.php?action=listGenres">Genres<a>
        </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div>
        <main>
            <div class= "contenu">
                <h2 class = "h2-contenu"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div> 
    
</body>
</html>