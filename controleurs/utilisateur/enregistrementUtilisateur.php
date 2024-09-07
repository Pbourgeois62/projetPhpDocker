<?php


require_once '../../classes/utilisateur.php';
require_once '../../classes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Veuillez renseigner tous les champs";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide";
        exit;
    }
    if ($password != $confirm_password) {
        echo "Les deux mots de passe ne correspondent pas";
        sleep(5);
        header('Location: ../../forms/formEnregistrement.php');
        exit;
    }
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);


    $objDb = new database;
    $utilisateur = new utilisateur($objDb);
    
    $utilisateur->setNom($nom);
    $utilisateur->setPrenom($prenom);
    $utilisateur->setEmail($email);
    $utilisateur->setPassword($password_hashed);
    

    $resultat = $utilisateur->newUser();

    if ($resultat) {
        echo "Inscription réussie. Vous allez être redirigé vers la page de connexion";
        sleep(5);
        header('Location: ../../forms/formConnexion.php');
        exit;
    } else {
        echo "une erreur est survenue lors de l'inscription";
        sleep(5);
        var_dump($nom);
        //header('Location: ../../forms/formEnregistrement.php');
        exit;
    }
}
