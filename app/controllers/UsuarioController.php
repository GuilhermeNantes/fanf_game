<?php
require_once __DIR__ . '/../../config/database.php';
// Inclua a model, ajustando o caminho conforme a estrutura do seu projeto
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController {
    public function listar() {
        // Instancia o model passando o objeto PDO
        $model = new UsuarioModel($GLOBALS['pdo']);
        // Chama o método correto para listar os usuários
        $usuarios = $model->listarUsuarios();
        
        require '../app/views/usuarios_view.php';
    }
}
?>
