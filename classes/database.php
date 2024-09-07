<?php
class database
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    private $localConnexion = [
        'host' => 'localhost',
        'dbname' => 'projetsimplon',
        'username' => 'root',
        'password' => ''
    ];


    public function __construct($config = [])
    {
        $this->host = $config['host'] ?? $this->localConnexion['host'];
        $this->dbname = $config['dbname'] ?? $this->localConnexion['dbname'];
        $this->username = $config['username'] ?? $this->localConnexion['username'];
        $this->password = $config['password'] ?? $this->localConnexion['password'];
    }

    public function connectDatabase()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Connexion échouée: " . $e->getMessage();
            return null;
        }
    }
}
