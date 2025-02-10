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
                echo "<p style='color: red;'>Preencha todos os campos!</p>";
            } else {
                $model = new UsuarioModel($GLOBALS['pdo']);
    
                // Verifica se o usuário já existe no banco
                if ($model->usuarioExiste($username)) {
                    echo "<p style='color: red;'>O nome de usuário já existe. Por favor, escolha outro.</p>";
                } else {
                    $senhaCriptografada = password_hash($password, PASSWORD_DEFAULT);
                    $model->criarUsuario($username, $senhaCriptografada);
                    echo "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
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
                echo "<p style='color: red;'>Preencha todos os campos!</p>";
            } else { 
                $model = new UsuarioModel($GLOBALS["pdo"]);
                $usuario = $model->verificarLogin($password);

                if ($usuario && password_verify($password,$usuario['password'])) {
                    session_start();
                    $_SESSION['usuario'] = $usuario['username'];// armazenado na sessão
                    echo "<p style='color: green;'>Login realizado com sucesso!</p>";
                    header("Location: /host-gui/fanf_game/public/index.php?rota=aviso"); // Redireciona para o menu do jogo
                    exit;
                } else {
                    echo "<p style='color: red;'>Usuário ou senha inválidos.</p>";
                }
            }
                
        }
        require __DIR__ . '/../views/login_view.php';
    }
}
?>
