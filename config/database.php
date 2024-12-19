<?php
class Database {
    private $host = "127.0.0.1"; // Utilisez 127.0.0.1 au lieu de localhost pour éviter certains problèmes DNS
    private $db_name = "mvc_project"; // Nom de la base de données
    private $username = "root"; // Nom d'utilisateur MySQL par défaut
    private $password = ""; // Mot de passe MySQL par défaut (vide sur Laragon)
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "'mysql:host=' . $this->host . ;'dbname=' . $this->db_name",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie à la base de données.";
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>


