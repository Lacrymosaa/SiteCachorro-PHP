<?php
class ConexaoBD {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cachorro";
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Failed to connect to database: " . $e->getMessage());
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}

?>