<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/host-gui/fanf_game/public/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editar Usuário</title>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Editar Usuário</h2>
            <form method="POST" action="">
                <!-- Campo oculto para o ID do usuário -->
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                
                <div class="input-group">
                    <input type="text" name="username" value="<?php echo $usuario['username']; ?>" required>
                    <label for="username">Nome de Usuário</label>
                </div>
                
                <div class="input-group">
                    <input type="password" name="password">
                    <label for="password">Nova Senha (deixe em branco se não quiser alterar)</label>
                </div>

                <button type="submit" class="login-btn">Salvar Alterações</button>

                <!-- Link para cancelar -->
                <p class="register-text">
                    Você deseja cancelar a edição? <a href="/host-gui/fanf_game/public/index.php?rota=usuarios">Voltar</a>
                </p>
            </form>
        </div>
    </div>
    <script src="/host-gui/fanf_game/public/js/msgRemover.js"></script>
</body>
</html>
