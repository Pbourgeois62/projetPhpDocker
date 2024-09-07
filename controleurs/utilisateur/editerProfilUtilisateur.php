<?php
session_start();
require_once('../../classes/utilisateur.php');
require_once('../../classes/database.php');

if (empty($_SESSION['id'])) {
    echo "Utilisateur non connecté";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $new_nom = trim($_POST['new_nom'] ?? '');
    $new_prenom = trim($_POST['new_prenom'] ?? '');
    $new_email = trim($_POST['new_email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $ObjDb = new database;
    $objUtilisateur = new utilisateur($ObjDb);
    $objUtilisateur -> setId($_SESSION['id']);    
    $hashedPassword = $objUtilisateur-> getPassword();

   if (password_verify($_POST['password'], $hashedPassword)){

        $objUtilisateur->setNom($new_nom);
        $objUtilisateur->setPrenom($new_prenom);
        $objUtilisateur->setEmail($new_email);       
        $objUtilisateur->setPassword($hashedPassword);
            
        $resultat = $objUtilisateur->updateUser();
                

        if ($resultat) {
            echo "Votre profil a été mis à jour avec succès.";
            var_dump($resultat);
            header('Location: ../../vues/profil.php');
            exit;

        } else {

            echo "Erreur lors de la mise à jour de vos données.";
                      
            header('Location: connexionUtilisateur.php');
            exit;

        }
    } else {

    echo "Méthode non autorisée.";
    exit;

    }
}
