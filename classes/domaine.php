<?php

class domaine
{
    public $id;
    public $nom;
    public $pdo;

    public function __construct(database $db)
    {
        $this->pdo = $db->connectDatabase();    
    }

    public function getId(){
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        return $this->nom = $nom;
    }

    public function ajouterDomaine(){
        try {
            $sql= "INSERT INTO domaine (nom) VALUES(:nom)" ;
            $stmt=$this->pdo->prepare($sql);
            $stmt->bindParam(':nom',$this->nom);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        catch(PDOException $e){
            echo " Erreur lors de la connexion à la BDD" . $e->getMessage();
        }
    }

    public function listeDomaine()
    {
        try {
            $sql = "SELECT nom, id FROM domaine";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute();
            $resultat=$stmt->fetchAll(PDO::FETCH_ASSOC);

            if($resultat){
                return $resultat;
            }

            else {
                return null;
            }

        } catch (PDOException $e) {
            echo "Erreur rencontrée lors de la connexion à la BDD" . $e->getMessage();
        }
    }
}
