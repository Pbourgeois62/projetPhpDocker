<?php require_once '../navbar.php';
require_once '../classes/domaine.php';
require_once '../classes/lien.php';
require_once '../classes/database.php';
$objDb = new database;
$domaineObj = new domaine($objDb);
$domaines = $domaineObj->listeDomaine();
$lienObj = new lien($objDb);
if (isset($_GET['id'])) {
    $lienId = $_GET['id'];
    $lien = $lienObj->getLien($lienId);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>

<body>
    <form action='../controleurs/lien/creerEditerLien.php' method="post">

        <h1>Ajouter Un lien</h1>

        <input type="hidden" name="id" value="<?php echo $lien['id'] ?? ''; ?>">

        <label for="url">Url: </label>
        <input type="text" id="url" name="url" value="<?php echo isset($lienId) ? htmlspecialchars($lien['url']) : ''; ?>" required>
        <br>
        <br>

        <label for="titre">Alias: </label>
        <input type="text" id="titre" name="titre" value="<?php echo isset($lienId) ? htmlspecialchars($lien['titre']) : ''; ?>" required>
        <br>
        <br>

        <label for="description">Description: </label>
        <input type="text" id="description" name="description" value="<?php echo isset($lienId) ? htmlspecialchars($lien['description']): ''; ?>" required>
        <br>
        <br>

        <label for="domaine">Definir un domaine</label>
        <select id="domaine" name="domaine">
            <?php foreach ($domaines as $domaine): ?>
                <option value="<?php echo ($domaine['id']); ?>">
                    <?php echo htmlspecialchars($domaine['nom']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>

        <button type="submit">Valider</button><br><br>
        <?php
        if(isset($_GET['id'])) : ?>       
        <a href="../controleurs/lien/supprimerLien.php?id=<?php echo $lienId ;?>" class="button">supprimer</a><br><br>
        <?php endif ?>
        <a href="../vues/liensUtiles" class="button">retour</a>

    </form>
</body>

</html>