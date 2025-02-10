<?php
session_start();

class AvisoController {
    public function exibirAviso() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Iniciar a sessão apenas se ainda não estiver ativa
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['aviso_visto'] = true;
            header("Location: /host-gui/fanf_game/public/index.php?rota=menu");
            exit;
        }
    
        $mensagem = isset($_SESSION['usuario']) 
            ? "Este jogo contém sustos e sons altos."
            : "Você não está logado. Por favor, faça o login.";
    
        require_once __DIR__ . '/../views/aviso_view.php';
    }
    
    
}
?>
