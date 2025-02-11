<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/host-gui/fanf_game/public/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="">
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="username">Usuário</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="password">Senha</label>
                </div>

                <!-- Lembre-se de mim -->
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Lembre-se de mim</label>
                </div>

                <button type="submit" class="login-btn">Entrar</button>

                <!-- Link para registrar-se -->
                <p class="register-text">
                    Não tem uma conta? <a href="index.php?rota=register">Registre-se</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
