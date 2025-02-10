<?php
require __DIR__ . '/../app/controllers/UsuarioController.php';
require_once __DIR__ . '/../app/controllers/AvisoController.php';

$rota = $_GET['rota'] ?? '';

if ($rota === 'usuarios') {
    $controller = new UsuarioController();
    $controller->listar();
} elseif($rota === 'register'){
    $controller = new UsuarioController();
    $controller->cadastrar();
} elseif($rota === 'login'){
    $controller = new UsuarioController();
    $controller->login();
} elseif ($rota === 'aviso') {
    $controller = new AvisoController();
    $controller->exibirAviso();
} elseif ($rota === 'menu') {
    // Verifica se o usuário já viu o aviso antes de entrar no menu
    if (!isset($_SESSION['viu_aviso'])) {
        header("Location: /host-gui/fanf_game/public/index.php?rota=aviso");
        exit;
    }
    require '../app/views/menu_view.php';
} else {
    echo "<h1>404 - Página não encontrada</h1>";
}
?>