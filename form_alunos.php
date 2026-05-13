<?php
    require_once "includes/config.inc.php";

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Salvar"])){
        $nome = trim($_POST["nome"] ?? '');
        $email = trim($_POST["email"] ?? '');

        $stmt = $pdo -> prepare('INSERT INTO alunos (nome, email) VALUES (:nome, :email)');
        $stmt -> execute([
            ':nome' => $nome,
            ':email' => $email,
        ]);
        header("Location:./");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method= "post" action= "">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>
        <br>
        <input type="submit" name="Salvar" value="1">
    </form>
</body>
</html>