<?php
include_once 'testar.php';
include_once 'navbar.php';
  ?>

<!DOCTYPE html>
<html>
<head>
    <title>SYSUNI - Alteração de dados</title>
</head>

<!-- Formulario -->
<form method="POST" action="alt2_aluno_turma.php" >
<div class="container-alt">
<H2>Alteração de dados - Aluno em Turma</H2><br> 
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Periodo</th>
            <th>Ano</th>
            <th>Semestre</th>
            <th>Opção</th>
        </tr>
    </thead>
    <tbody>
    
        <?php
        $sql = $pdo->query("SELECT * FROM aluno_turma");
        //var_dump($result);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $aluno_id = $row['aluno_id'];
            $turma_id = $row['turma_id'];
            $sql2 = $pdo->query("SELECT nome FROM aluno WHERE id = {$aluno_id}");
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
            $aluno_nome = $row2['nome'];
                ?>
            <tr>
                <td><?= $aluno_id ?></td>
                <td><?= $aluno_nome ?></td>
                <?php
                $sql3 = $pdo->query("SELECT * FROM turma WHERE id = {$turma_id}");
                $row3 = $sql3->fetch(PDO::FETCH_ASSOC); 
                $cid = $row3['curso_id']; 
                $sql4 = $pdo->query("SELECT `nome` FROM `curso` WHERE `id` = {$cid}");
                $row4 = $sql4->fetch(PDO::FETCH_ASSOC);
                ?>
                <td><?= $cid.' - '.$row4['nome']?></td>
                <td><?= $turma_id.' - '.$row3['letra'] ?></td>
                <td><?= $row3['periodo'] ?></td>
                <td><?= $row3['ano'] ?></td>
                <td><?= $row3['semestre'] ?></td>
                <td><?php echo "<input type='radio' id='checkaluno' name='checkaluno' value='{$aluno_id}'>
                                <input type='hidden' name='turma_id' value='{$turma_id}'></div>";?>
                </td>
            </tr>
            <?php } ?>

    </tbody>
</table>
  </div>
  <button type="submit" name="alterar" class="btn btn-outline-warning">Alterar</button>
  <button type="submit" name="remover" class="btn btn-outline-danger">Remover</button>
</form>

<!--
<script type="text/javascript">
   var inputs = document.querySelectorAll('input');

function verificar() {
    return [].filter.call(inputs, function (input) {
        return input.checked;
    }).length;
}
document.querySelector('button').addEventListener('click', function () {
    var valido = verificar();
    if (!valido) alert('Falta escolher uma checkbox!');
    else alert('Tudo ok!');
});
</script>
-->

</body>
</html>