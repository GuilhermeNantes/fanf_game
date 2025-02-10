<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li>
                ID: <?php echo $usuario['id']; ?> |
                Nome: <?php echo $usuario['username']; ?> |
                Criado em: <?php echo $usuario['created_at']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
