<?php
require_once('conexao.php');

class Cachorro {
    private $pdo;

    public function __construct() {
        $conexaoBD = new ConexaoBD();
        $this->pdo = $conexaoBD->getPDO();
    }

    public function listar() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM cachorro");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Failed to list dogs: " . $e->getMessage());
        }
    }

    public function incluir($nome, $raca, $cor, $sexo) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO cachorro (nome, raca, cor, sexo) VALUES (:nome, :raca, :cor, :sexo)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':raca', $raca);
            $stmt->bindParam(':cor', $cor);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Failed to add dog: " . $e->getMessage());
        }
    }

    public function alterar($codigo, $nome, $raca, $cor, $sexo) {
        try {
            $stmt = $this->pdo->prepare("UPDATE cachorro SET nome = :nome, raca = :raca, cor = :cor, sexo = :sexo WHERE codigo = :codigo");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':raca', $raca);
            $stmt->bindParam(':cor', $cor);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Failed to update dog: " . $e->getMessage());
        }
    }

    public function excluir($codigo) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM cachorro WHERE codigo = :codigo");
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Failed to delete dog: " . $e->getMessage());
        }
    }

    public function buscar($codigo) {
        $query = "SELECT * FROM cachorro WHERE codigo = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$codigo]);
        return $stmt->fetch();
    }
}

?>
