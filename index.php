<?php
    require_once "includes/config.inc.php";

    $stmt = $pdo -> query( "SELECT * FROM alunos ORDER BY  id_aluno ASC");
    
    $alunos = $stmt -> fetchAll();


    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_id"])){
        $id = filter_input(INPUT_POST, 'delete_id', FILTER_VALIDATE_INT);
        echo $id;
        die();
    }
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
                    <td>
                        <form method="post" action ="/form_contato.php" >
                            <input type="hidden" name="atualiza_id" value="<?=$aluno['id_aluno']; ?>">
                            <button type="submit"> Atualizar </button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action ="">
                            <input type="hidden" name="delete_id" value="<?=$aluno['id_aluno']; ?>">
                            <button type="submit"> Excluir </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif ?>
    
</body>
</html>