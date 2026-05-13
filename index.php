<?php
    require_once "includes/config.inc.php";

    $stmt = $pdo -> query( "SELECT * FROM alunos ORDER BY  id_aluno ASC");
    
    $alunos = $stmt -> fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="form_alunos.php">Sei la</a>
    <?php
        if(empty($alunos)) : ?>
            <p>Nenhum registro encontrado</p>
    <?php else : ?>
    <table border= "1" cellpadding = "1" cellspacing="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($alunos as $aluno) :
            ?>
                <tr>
                    <td><?=htmlspecialchars($aluno["id_aluno"])?></td>
                    <td><?=htmlspecialchars($aluno["nome"])?></td>
                    <td><?=htmlspecialchars($aluno["email"])?></td>
                    <td>Atualizar</td>
                    <td>Excluir</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif ?>
    
</body>
</html>