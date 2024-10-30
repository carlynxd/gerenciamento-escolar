<?php
include '../includes/db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM alunos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: menu.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['idade'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];

    $sql = "UPDATE alunos SET nome = :nome, email = :email, idade = :idade WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email, 'idade' => $idade, 'id' => $id]);

    header('Location: menu.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aditando Aluno</title>
</head>

<body>
    <h1>Editar Aluno</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= $aluno['nome'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $aluno['email'] ?>" required><br><br>
        Idade: <input type="number" name="idade" value="<?= $aluno['idade'] ?>" required><br><br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>