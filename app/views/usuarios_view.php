<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="/host-gui/fanf_game/public/css/tabela.css"> <!-- Referência ao CSS -->
</head>
<body>
    <div class="table-container">
        <h1>Lista de Usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($usuarios) && !empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['username']; ?></td>
                            <td><?php echo $usuario['created_at']; ?></td>
                            <td>
                                <div class="actions-container">
                                    <a href="/host-gui/fanf_game/public/index.php?rota=editar&id=<?php echo $usuario['id']; ?>">
                                        <button class="edit-btn">Editar</button>
                                    </a>
                                    <!-- Formulário de Deletar -->
                                    <form action="/host-gui/fanf_game/public/index.php?rota=deletar" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?');">
                                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                        <button type="submit" class="delete-btn">Deletar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">Nenhum usuário encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
