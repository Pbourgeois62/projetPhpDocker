<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <?php require_once '../../navbar.php'; ?>
    <div class="bloc-texte">

        <ol>
            <li>Variables et Sélecteurs</li>

            <p>:root {} : permet de définir des variables CSS globales (ex : --antracite, --rouge).<br>
                * {} : applique un style à tous les éléments (ex : list-style: none; retire les puces des listes).<br></p>

            <li>Styles Généraux</li>
            <p> body : définit le style global de la page (ex : background-image pour ajouter une image de fond).<br>
                border : ajoute une bordure autour d'un élément (ex : solid 2px var(--rouge);).<br>
                box-shadow : ajoute une ombre à un élément (ex : box-shadow: 0px 1px 2px var(--doré);).<br></p>

            <li>Flexbox</li>

            <p>display: flex; : active le mode Flexbox pour organiser les éléments.<br>
                justify-content: space-between; : répartit les éléments Flexbox avec un espace égal entre eux.<br>
                align-items: center; : centre verticalement les éléments dans une Flexbox.<br></p>

            <li>Positionnement</li>

            <p>relative; : positionne un élément par rapport à sa position normale.<br>
                position: absolute; : positionne un élément par rapport à son parent le plus proche qui est positionné.<br>
                z-index: 1000; : place un élément au-dessus des autres sur l'axe Z (profondeur).<br>
                width: 100%; : fixe la largeur d'un élément pour qu'elle prenne 100% de son conteneur.<br></p>

            <li>Transitions et Effets</li>
            
            <p>transition: color 0.3s ease; : ajoute une transition douce lors du changement de couleur.<br>
                display: none; : cache un élément (souvent utilisé pour les sous-menus).<br></p>

        </ol>
    </div>
</body>

</html>