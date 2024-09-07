<?php
session_start();
require_once  '../../classes/database.php';
require_once '../../classes/lien.php';
if (isset($_SESSION['id']) && isset($_GET['id'])) {
    $SuprLienId = $_GET['id'];
    if (filter_var($SuprLienId, FILTER_VALIDATE_INT)) {
        $objDb = new database;
        $lienObj = new lien($objDb);
        $lienObj->setId($SuprLienId);
        $resultat = $lienObj->supprimerLien();
        echo "Le lien a été supprimé avec succès";        
    }
} else {
    echo "Vous avez besoin d'être connecté pour pouvoir supprimer un lien";
}
header('location: ../../vues/liensUtiles.php');
