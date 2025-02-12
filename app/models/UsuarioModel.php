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
    public function verificarLogin($username) {
        $sql = 'SELECT * FROM usuarios WHERE username = :username';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function atualizarUsuario($id, $username, $password) {
        $sql = "UPDATE usuarios SET username = :username, password = :password WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function deletarUsuario($id) {
        try {
            // Prepara a query de exclusão
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true; // Deletado com sucesso
            } else {
                return false; // Nenhuma linha afetada (talvez o ID não exista)
            }
        } catch (PDOException $e) {
            // Em caso de erro, retorna falso e exibe a mensagem de erro
            echo "Erro ao excluir o usuário: " . $e->getMessage();
            return false;
        }
    }
    
}
