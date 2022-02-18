<?php
include_once 'testar.php';
include 'navbar.php';
?>

<title>Sysuni - Alteração de dados</title>

<div class="container-alt">
<h2>Alteração de dados - Turma</h2><br>
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Curso</th>
            <th>Letra</th>
            <th>Periodo</th>
            <th>Ano</th>
            <th>Semestre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = $pdo->query("SELECT * FROM turma");
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
                <td><?= $cid .' - '. $row2['nome']?></td>

                <td><?= $row['letra'] ?></td>
                <td><?= $row['periodo'] ?></td>
                <td><?= $row['ano'] ?></td>
                <td><?= $row['semestre'] ?></td>
                <td>
                   <button type="button" class="btn btn-outline-warning" onclick="window.location.href='alt2_turma.php?id=<?= $row['id'] ?>'">Editar</button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href='exclui_turma.php?id=<?=$row['id']?>'">Excluir</button>
                </td>
            </tr>
            <?php } ?>

    </tbody>
</table>
  
</div>
        

</body>
</html>