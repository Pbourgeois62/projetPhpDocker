<?php
session_start();
require_once('../../classes/lien.php');
require_once('../../classes/database.php');


if (empty($_SESSION['id'])) {
    echo "Utilisateur non connecté";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $url = trim($_POST['url'] ?? '');
    $titre = trim($_POST['titre'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $domaine = $_POST['domaine'];


    $objDb = new database;
    $lienObj = new lien($objDb);
    $lienObj->setUrl($url);
    $lienObj->setTitre($titre);
    $lienObj->setDescription($description);
    $lienObj->setUtilisateur_id($_SESSION['id']);
    $lienObj->setDomaineId($domaine);
    if ($_POST['id']) {
        $lienObj->setId($_POST['id']);
        $resultat = $lienObj->editLien();
    } else {
        $resultat = $lienObj->creerLien();
    }


    if ($resultat) {
        echo "Creation du lien effectuée avec succès";
        header("Location:  ../../vues/liensUtiles.php");
        exit;
    } else {
        echo "Erreur lors de la création du lien";
        exit;
    }
}
