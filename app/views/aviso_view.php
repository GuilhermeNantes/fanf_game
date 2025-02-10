<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso</title>
</head>
<body>
    <div class="container">
        <h2>Aviso Importante</h2>
        <p><?php echo $mensagem; ?></p>

        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="/host-gui/fanf_game/public/index.php?rota=menu">Continuar</a>
        <?php else: ?>
            <a href="/host-gui/fanf_game/public/index.php?rota=login">Fazer Login</a>
        <?php endif; ?>
    </div>
</body>
</html>
