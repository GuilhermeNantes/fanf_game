<?php
require __DIR__ . '/../app/controllers/UsuarioController.php';

$rota = $_GET['rota'] ?? '';

if ($rota === 'usuarios') {
    $controller = new UsuarioController();
    $controller->listar();
} elseif($rota === 'register'){
    $controller = new UsuarioController();
    $controller->cadastrar();

}
 else {
    echo "<h1>404 - Página não encontrada</h1>";
}
?>