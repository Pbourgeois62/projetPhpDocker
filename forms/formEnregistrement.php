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

    <form action="../../controleurs/utilisateur/enregistrementUtilisateur.php" method="post">

        <h1>Enregistrement</h1>


        <label for="nom">Nom: </label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <br>
        <label for="prenom">Prénom: </label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <br>
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="password">Mot de passe: </label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <label for="confirm_password">Confirmer Mot de passe: </label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <br>

        <button type="submit">Envoyer</button>
    </form>

</body>

</html>