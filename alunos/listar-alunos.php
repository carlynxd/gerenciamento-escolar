<?php
include '../includes/db.php';

$sql = "SELECT * FROM alunos";
$stmt = $pdo->query($sql);
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listando Alunos</title>
</head>

<body>
    <h1>Lista de Alunos</h1>
    <a href="adicionar-alunos.php">Adicionar Novo Aluno</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td><?= $aluno['id'] ?></td>
                <td><?= $aluno['nome'] ?></td>
                <td><?= $aluno['email'] ?></td>
                <td><?= $aluno['idade'] ?></td>
                <td>
                    <form action="editar-alunos.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                    <form action="excluir-alunos.php" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="menu.php">Voltar</a>
</body>

</html>