<?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
        <title>Sysuni - Alteração de dados</title>
</head>

<div class="container-alt ">
<h2><caption>Alteração de dados - Curso</caption></h2><br>
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Sigla</th>
            <th></th>
            <th></th>
            <th></th>
            <th>Opção 1</th>
            <th>Opção 2</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = $pdo->query("SELECT * FROM curso");
        //var_dump($result);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['sigla'] ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                 
                   <button type="button" class="btn btn-outline-warning" onclick="window.location.href='alt2_curso.php?id=<?= $row['id'] ?>'">Editar</button>
                   </td>
                   <td>
                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href='exclui_curso.php?id=<?= $row['id'] ?>'">Excluir</button>
            
                </td>
            </tr>
            <?php } ?>

    </tbody>
</table>
</div>

</body>
</html>