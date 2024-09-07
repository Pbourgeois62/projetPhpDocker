<?php require_once '../navbar.php';
require_once '../classes/lien.php';
$dbObj = new database();
$lienObj = new lien($dbObj);
$liens = $lienObj->listeLiens();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liens utiles</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="bouton-conteneur">
        <button class="bouton-central">
            <a href="../forms/formAjoutLien.php" class="button">Ajouter un lien</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Lien</th>
                <th>Description</th>
                <th>Domaine</th>
                <th>Note</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($liens) {
                foreach ($liens as $lien) {
            ?>
                    <tr>
                        <td><a href="<?php echo htmlspecialchars($lien['url']); ?>" target="_blank"><?php echo htmlspecialchars($lien['titre']); ?></a></td>
                        <td><?php echo htmlspecialchars($lien['description'] ?? ''); ?></td>
                        <td><?php $domaine = $lienObj->getDomaineLien($lien['domaine_id']);

                            echo htmlspecialchars($domaine ?? ''); ?></td>
                        <td>Note</td>
                        <?php if ($lien['utilisateur_id'] === $_SESSION['id'] || $_SESSION['admin'] == true) : ?>
                            <td><a href="/forms/formAjoutLien.php?id=<?php echo ($lien['id']) ?>">Editer</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4'>Aucun lien trouvé.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>