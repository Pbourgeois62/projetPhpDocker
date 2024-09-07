<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <?php require_once '../navbar.php';
    
    ?>
    <form action="../controleurs/utilisateur/connexionUtilisateur.php" method="post">
        <h1>Connexion</h1>

        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required>
        <br>
        <br>
        <label for="password">Mot de passe: </label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>

        <button type="submit">Envoyer</button>
    </form>

</body>

</html>