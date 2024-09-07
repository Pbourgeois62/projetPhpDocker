<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php   
    require_once '../navbar.php';
    

    if (isset($_SESSION['prenom'])) {
        $prenom = $_SESSION['prenom'];
    } else {
        $prenom = "invité";
    }
    ?>
    <div class="bloc-texte">
        <h1>Bonjour <?php echo htmlspecialchars($prenom) ?></h1>
        <p>Ce site est en construction et a pour but premier de servir d'outil lors de ma formation de développeur web full-stack chez SIMPLON.<br><br>
            Il s'agira dans un premier lieu d'un pense-bête, mais au fur et à mesure de ma montée en compétences, pourra inclure des outils de facilitation au développement, des cours structurés, des projets, des exercices, etc ...
        </p>
    </div>

</body>

</html>