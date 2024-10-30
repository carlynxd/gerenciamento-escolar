<?php
include '../includes/db.php';

$sql = "SELECT * FROM disciplinas";
$stmt = $pdo->query($sql);
$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listando Disciplinas</title>
</head>

<body>
    <h1>Lista de Disciplinas</h1>
    <a href="adicionar-disciplinas.php">Adicionar Nova Disciplina</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($disciplinas as $disciplina): ?>
            <tr>
                <td><?= $disciplina['id'] ?></td>
                <td><?= $disciplina['nome'] ?></td>
                <td>
                    <form action="editar-disciplinas.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $disciplina['id'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                    <form action="excluir-disciplinas.php" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        <input type="hidden" name="id" value="<?= $disciplina['id'] ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="menu.php">Voltar</a>
</body>

</html>