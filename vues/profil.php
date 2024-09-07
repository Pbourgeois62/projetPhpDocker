
<?php 
require_once('../navbar.php');
require_once('../classes/utilisateur.php');

if(isset($_SESSION['id'])){

$nomUtilisateur = $_SESSION['nom'];
$prenomUtilisateur = $_SESSION['prenom'];
$emailUtilisateur = $_SESSION['email'];

}

else {
    echo "Utilisateur non connecté";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<div class = "bloc-texte">
<ul>
    <li>
        Nom: <?php echo htmlspecialchars($nomUtilisateur) ?><br><br>
    </li>
    <li>
        Prenom: <?php echo htmlspecialchars($prenomUtilisateur) ?><br><br>
    </li>
    <li>
        Email: <?php echo htmlspecialchars($emailUtilisateur) ?><br><br>
    </li>
    <li>
        
        <a href="/forms/formMajUtilisateur.php" class="button">Modifier le profil</a>        
    </li>
</ul>
</div>
</body>
