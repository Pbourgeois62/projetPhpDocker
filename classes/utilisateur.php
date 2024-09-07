<?php

require_once('database.php');

class utilisateur
{
    private $nom;
    private $prenom;
    private $password;
    private $email;
    private $pdo;
    private $id;
    private $admin;
    private $objDb;

    public function __construct(database $db)
    {
        $this->pdo = $db->connectDatabase();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        return $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAdmin() {
        return $this-> admin;
    }

    public function setAdmin($admin) {
        return $this-> admin = $admin;
    }    

    public function connectDatabase(database $db)    
    {

        $objDb = new database;

        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Connexion échouée: " . $e->getMessage();
            return null;
        }
    }
    
    public function newUser()
    {

        try {

            $sql = "INSERT INTO utilisateur (nom, prenom, email, password, admin) VALUES (:nom, :prenom, :email, :password, admin)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {

            if ($e->getCode() === '23000') {
                echo "Cette adresse email est déjà utilisée.";
            } else {
                echo "Erreur: " . $e->getMessage();
            }
            return false;
        }
    }
    public function connectUser()
    {
        try {
            $sql = "SELECT password, prenom, id, nom, admin FROM utilisateur WHERE email=:email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashedPassword = $row['password'];
                $prenom = $row['prenom'];
                $nom = $row['nom'];
                $id = $row['id'];
                $admin = $row['admin'];

                if (password_verify($this->password, $hashedPassword)) {
                    session_start();
                    $_SESSION['email'] = $this->email;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['nom'] = $nom;
                    $_SESSION['id'] = $id;
                    $_SESSION['admin'] = $admin;
                    return true;
                } else {
                    echo "Le mot de passe renseigné n'existe pas";
                    sleep(5);
                    header('Location ../forms/formConnexion.php');
                    return false;
                }
            } else {
                echo "l'email renseigné n'existe pas";
                sleep(5);
                header('Location ../forms/formConnexion.php');
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }

    public function updateUser()
    {
        try {

            $sql = "UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':id', $this->id);
            session_start();
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la BDD" . $e->getMessage();
            return false;
        }
    }

    public function updatePassword()
    {

        try {
            $sql = "UPDATE utilisateur SET password=:password WHERE id=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':password', $this->password);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo " Une erreur s'est produite lors de la connexion à la BDD" . $e->getMessage();
            return false;
        }
    }

    public function getPassword()
    {

        try {
            $sql = "SELECT password FROM utilisateur WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return $row['password'];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo " Une erreur s'est produite lors de la connexion à la BDD" . $e->getMessage();
            return false;
        }
    }
}
