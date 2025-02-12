<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController {
    public function listar() {
        // Instancia o model passando o objeto PDO através do $GLOBALS
        $model = new UsuarioModel($GLOBALS['pdo']);
        $usuarios = $model->listarUsuarios();
        
        // Use require_once com o caminho absoluto a partir do diretório atual
        require_once __DIR__ . '/../views/usuarios_view.php';
    }
    
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');
    
            if (empty($username) || empty($password)) {
                echo "<p class='message message-background error-message'>Preencha todos os campos!</p>";
            } else {
                $model = new UsuarioModel($GLOBALS['pdo']);
            
                // Verifica se o usuário já existe no banco
                if ($model->usuarioExiste($username)) {
                    echo "<p class='message message-background error-message'>O nome de usuário já existe. Por favor, escolha outro.</p>";
                } else {
                    $senhaCriptografada = password_hash($password, PASSWORD_DEFAULT);
                    $model->criarUsuario($username, $senhaCriptografada);
                    echo "<p class='message message-background success-message'>Usuário cadastrado com sucesso!</p>";
                }
            }
        }
    
        require_once __DIR__ . '/../views/register_view.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');
        
            if (empty($username) || empty($password)) {
                echo "<p class='message message-background error-message'>Preencha todos os campos!</p>";
            } else { 
                $model = new UsuarioModel($GLOBALS["pdo"]);
                $usuario = $model->verificarLogin($username); // Pegamos os dados do usuário pelo nome
    
                // Verifica se o usuário existe e se a senha está correta
                if ($usuario && password_verify($password, $usuario['password'])) {
                    session_start();
                    $_SESSION['usuario'] = $usuario['username']; // Armazena na sessão
                    echo "<p class='message message-background success-message'>Login realizado com sucesso!</p>";
                    header("Location: /host-gui/fanf_game/public/index.php?rota=aviso"); // Redireciona para o menu do jogo
                    exit;
                } else {
                    echo "<p class='message message-background error-message'>Usuário ou senha inválidos.</p>";
                }
            }
        }
        require __DIR__ . '/../views/login_view.php';
    }
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $username = trim($_POST['username']);
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    
            $model = new UsuarioModel($GLOBALS['pdo']);
            if ($model->atualizarUsuario($id, $username, $password)) {
                echo "<p class='message message-background success-message'>Usuário atualizado com sucesso!</p>";
            } else {
                echo "<p class='message message-background error-message'>Erro ao atualizar usuário.</p>";
            }
        }
    
        require __DIR__ . '/../views/editar_view.php';
    }
    
    public function deletar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $model = new UsuarioModel($GLOBALS['pdo']);
    
            // Tenta deletar o usuário
            if ($model->deletarUsuario($id)) {
                // Redireciona para a página de usuários após a exclusão
                header("Location: /host-gui/fanf_game/public/index.php?rota=usuarios");
                exit;
            } else {
                // Exibe uma mensagem de erro se a deleção falhar
                echo "<p class='message message-background error-message'>Erro ao Deletar usuário.</p>";
            }
        }
    }
}    
?>
