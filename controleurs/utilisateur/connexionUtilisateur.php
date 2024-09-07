<?php

require_once '../../classes/utilisateur.php';
require_once '../../classes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide";
        exit;
    }
    if (empty($email) || empty($password)) {
        echo "Veuillez renseigner tous les champs";
        exit;
    }
    $objDb= new database;
    $utilisateur = new utilisateur($objDb);
    $utilisateur->setEmail($email);
    $utilisateur->setPassword($password);

    $resultat = $utilisateur->connectUser($email, $password);

    if ($resultat) {
        header('Location: /vues/home.php');
    } else {
        echo "une erreur est survenue lors de la connexion";
        sleep(5);
        header('Location: connexionUtilisateur.php');
        exit;
    }
}
