<?php
include '../includes/db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM disciplinas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: menu.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'])) {
    $nome = $_POST['nome'];

    $sql = "UPDATE disciplinas SET nome = :nome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'id' => $id]);

    header('Location: menu.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aditando Avaliação</title>
</head>

<body>
    <h1>Editar Avaliação</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= $aluno['nome'] ?>" required><br><br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>