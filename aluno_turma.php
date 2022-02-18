<?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>SYSUNI - CADASTRO</title>
</head>

<div class="container-alt">
<H2>CADASTRO DE ALUNO EM TURMA</H2><br><br>
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
<thead>
        <tr>
            <th>#</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Periodo</th>
            <th>Ano</th>
            <th>Semestre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = $pdo->query("SELECT * FROM turma");
        //var_dump($result);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                
                <?php 
                $cid = $row['curso_id']; 
                $inst = "SELECT `nome` FROM `curso` WHERE `id` = {$cid}";
                $sql2 = $pdo->query($inst);
                $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
                ?>
                <td><?= $row2['nome']?></td>
                <td><?= $row['letra'] ?></td>
                <td><?= $row['periodo'] ?></td>
                <td><?= $row['ano'] ?></td>
                <td><?= $row['semestre'] ?></td>
                <td>
                  <button type="button" class="btn btn-primary" onclick="window.location.href='aluno_turma2.php?t_id=<?= $row['id'] ?>'">Selecionar</button>
                </td>
            </tr>
            <?php } ?>

    </tbody>
</table>
</div>
</div>

</body>
</html>