<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAJ mot de passe</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php require_once '../navbar.php';
    ?>

    <form action="../controleurs/utilisateur/editerPasswordUtilisateur.php" method="post">

        <h1>Réinitialisation du mot de passe</h1>
        
        <label for="password">Mot de passe actuel: </label>
        <input type="password" id="password" name="password">
        <br>
        <br>
        <label for="new_password">Nouveau mot de passe: </label>
        <input type="password" id="new_password" name="new_password" >
        <br>
        <br>
        <label for="confirm_new_password">Confirmer nouveau Mot de passe: </label>
        <input type="password" id="confirm_new_password" name="confirm_new_password" >
        <br>
        <br>

        <button type="submit">Envoyer</button>
    </form>

</body>

</html>