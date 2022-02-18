
<?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sysuni - Alteração de dados</title>
</head>

<div class="container-alt">
<h2>Alteração de dados - Aluno</h2><br>
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Matricula</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = $pdo->query("SELECT * FROM aluno ORDER BY nome ASC");
        //var_dump($result);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['sexo'] ?></td>
                <td><?= $row['endereco'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td><?= $row['cpf'] ?></td>
                <td><?= $row['matricula'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                   <button type="button" class="btn btn-outline-warning" onclick="window.location.href='alt2_aluno.php?id=<?= $row['id'] ?>'">Editar</button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href='exclui_aluno.php?id=<?= $row['id'] ?>'">Excluir</button>
                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>
</div>
</div>

</body>
</html>
