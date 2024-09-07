<?php
session_start();
$switch = "";
if (isset($_SESSION['email'])) {
    $switch = "Déconnexion";
} else {
    $switch = "Connexion";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/vues/home.php"><img src="/images/logo.webp" alt="logo"></a>
        </div>
        <?php if (isset($_SESSION['email'])): ?>
            <ul class="navbar-menu">
                <li><a href="/vues/notes.php">Notes</a></li>
                <li class="deroulant"><a href="#">Pense bête</a>
                    <ul class="sous">
                        <li><a href='/vues/penseBête/css.php'>CSS</a>
                        <li><a href='/vues/penseBête/html.php'>HTML</a>
                        <li><a href='/vues/penseBête/php.php'>PHP</a>
                        <li><a href='/vues/penseBête/sql.php'>SQL</a>
                    </ul>
                </li>
                <li> <a href='/vues/cssGrid.php'>Css GRID</li>
                <li> <a href='/vues/codePen.php'>Code Pen</li>
                <li><a href='/vues/liensUtiles.php'>Liens utiles</a></li>
                <li><a href='/vues/codePine.php'>Code Pine</a></li>
            </ul>
        <?php endif; ?>
        <ul class="navbar-identification">
        <?php if (empty($_SESSION['email'])): ?>
                <li><a href='/forms/formEnregistrement.php'>Enregistrement</a></li>
            <?php else: ?>
                <li><a href='/vues/profil.php'>Profil</a></li>
            <?php endif ?>
            <li><a href='<?php echo $switch === "Déconnexion" ? "/controleurs/utilisateur/deconnexionUtilisateur.php" : "/forms/formConnexion.php"; ?>'>
                    <?php echo $switch; ?></a>
            </li>
            
        </ul>
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</body>

</html>