<?php
class UsuarioModel {
    public $pdo;

    // Recebe o objeto PDO como parâmetro no construtor
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para listar os usuários; nome padronizado para listarUsuarios
    public function listarUsuarios() {
        $stmt = $this->pdo->query("SELECT id, username, created_at FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);    
    }
}
?>
