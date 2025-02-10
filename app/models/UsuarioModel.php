<?php
class UsuarioModel {
    private $pdo;

    // Construtor: recebe a conexão PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Função para listar os usuários
    public function listarUsuarios() {
        $stmt = $this->pdo->query("SELECT id, username, created_at FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Função para criar um novo usuário
    public function criarUsuario($username, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
    public function usuarioExiste($username) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    
}
