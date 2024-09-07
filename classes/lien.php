<?php
require_once 'database.php';
class lien
{
    private $id;
    private $titre;
    private $description;
    private $url;
    private $note;
    private $utilisateur_id;
    private $pdo;
    private $domaine_id;    

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


    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getDomaineId()
    {
        return $this->domaine_id;
    }

    public function setDomaineId($domaine_id)
    {
        return $this->domaine_id = $domaine_id;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;
    }

    public function getNomUtilisateur($utilisateur_id)
    {
        try {

            $sql = "SELECT nom FROM utilisateur WHERE id= :utilisateur_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':utilisateur_id', $utilisateur_id, PDO::PARAM_INT);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                return $resultat['nom'];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la recuperation du nom d'utilisateur:" . $e->getMessage());
        }
    }

    public function creerLien()
    {
        try {
            $sql = "INSERT INTO lien (url, titre, description, utilisateur_id, domaine_id) VALUES (:url, :titre, :description, :utilisateur_id, :domaine_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':url', $this->url, PDO::PARAM_STR);
            $stmt->bindParam(':titre', $this->titre, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':utilisateur_id', $this->utilisateur_id, PDO::PARAM_INT);
            $stmt->bindParam(':domaine_id', $this->domaine_id, PDO::PARAM_INT);
            return $stmt->execute();            
        } catch (PDOException $e) {
            die("Erreur lors de la creation du lien" . $e->getMessage());
        }
    }

    public function getDomaineLien($domaine_id)
    {
        try {

            $sql = "SELECT nom FROM domaine WHERE id= :domaine_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':domaine_id', $domaine_id, PDO::PARAM_INT);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultat) {
                return $resultat['nom'];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la recuperation du nom d'utilisateur:" . $e->getMessage());
        }
    }

    public function getLien($id)
    {
        try {
            $sql = "SELECT * FROM lien WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return $resultat;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la connexion à la BDD" . $e->getMessage());
        }
    }

    public function editLien()
    {
        try {
            $sql = "UPDATE lien
            SET url = :url, titre = :titre, description = :description, domaine_id = :domaine_id
            WHERE id = $this->id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':url', $this->url, PDO::PARAM_STR);
            $stmt->bindParam(':titre', $this->titre, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':domaine_id', $this->domaine_id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            if ($resultat) {
                return $resultat;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la BDD";
            $e->getMessage();
            return false;
        }
    }

    public function supprimerLien()
    {
        try {
            $sql = "DELETE FROM lien WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            if ($resultat) {
                return $resultat;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la suppression du lien" . $e->getMessage());
        }
    }

    public function listeLiens()
    {

        try {
            $sql = "SELECT url, titre, description, domaine_id, utilisateur_id, id, note  FROM lien";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultat) {
                return $resultat;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Erreur lors de la récuperation des liens" . $e->getMessage());
        }
    }
}
