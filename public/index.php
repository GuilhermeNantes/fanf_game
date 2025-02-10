<?php
    require '../config/database.php';
    require '../routes/web.php';

    echo'<h1> Bem-vindo ao Fanf Game<h1>';
    if ($pdo) {
        echo "<p>✅ Conexão com o banco de dados estabelecida com sucesso!</p>";
    } else {
        echo "<p>❌ Falha na conexão com o banco de dados.</p>";
    }
    
?>