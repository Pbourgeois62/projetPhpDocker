<?php
session_start();
require_once '../../classes/database.php';
require_once '../../classes/utilisateur.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $objDb = new database;
    $objUtilisateur = new utilisateur($objDb);
    $objUtilisateur->setId($_SESSION['id']);    
    $hashedPassword = $objUtilisateur->getPassword();

    if (password_verify($_POST['password'], $hashedPassword)) {

        $newPassword = trim(htmlspecialchars($_POST['new_password']));
        $confirmNewPassword = trim(htmlspecialchars($_POST['confirm_new_password']));

        if ($newPassword === $confirmNewPassword) {

            $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);
            $objUtilisateur->setPassword($newPasswordHashed);
            $resultat = $objUtilisateur->updatePassword();

            if ($resultat) {

                echo " changement du mot de passe réalisé avec succès";
                require_once 'deconnexionUtilisateur.php';
                header('Location: ../../home.php');

            } else {

                echo " Une erreur s'est produit lors du changement de mot de passe";

            }
        } else {

            echo " Veuillez entrer deux mots de passe identiques";

        }

    } else {

        echo " Erreur de saisie du mot de passe";        
    exit;

    }
}
