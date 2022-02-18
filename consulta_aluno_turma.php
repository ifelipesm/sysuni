<?php  include_once 'testar.php'; include_once 'navbar.php'; ?>

<?php

    if($_SERVER['REQUEST_METHOD'] ==  'POST'){

        if(isset($_POST['filtro-categoria']) && isset($_POST['filtro-valor'])){
         $categoria = $_POST['filtro-categoria'];
         $valor = $_POST['filtro-valor'];

                try{
                $sql = $pdo->query("SELECT * FROM aluno_turma WHERE {$categoria} = '$valor' ORDER BY {$categoria} ASC");
                //$total_registros = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                    catch(PDOException $e){ // exceção da query
                    echo "<div id='alert-update' class='alert alert-danger' role='alert'>
                    <h3>[Erro] Falha na busca. <br> Log do erro: <?=vardump($e->getMessage());?></h3>
                    <meta http-equiv='refresh' content='2;consulta_aluno_turma.php'";
                    exit();
                    }
        }
                        else if (isset($_POST['filtro-reset'])) { // Dentro do POST, limpeza de filtro 
                            $sql = $pdo->query("SELECT * FROM aluno_turma ORDER BY aluno_id ASC");
                        }
                        else{ echo "<meta http-equiv='refresh' content='0;consulta_aluno_turma.php'";}
    }
    else { // Fora do POST, iteracao 0
        $sql = $pdo->query("SELECT * FROM aluno_turma ORDER BY aluno_id ASC");
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Sysuni - Consulta de dados</title>
</head>

<div class="container-alt">
<h2>CONSULTA DE DADOS - ALUNO EM TURMA</h2><br><br>

<form method="POST" action="consulta_aluno_turma.php">


<div class="input-group mb-3">
  <div class="input-group-prepend col-sm-4">
    <label class="input-group-text" for="filtro-categoria">Informe a categoria:</label>
    <select class="custom-select" name="filtro-categoria" id="filtro-categoria" required>
    <option disabled selected value="--">--</option>
    <option value="aluno_id">aluno_id</option>
    <option value="turma_id">turma_id</option>
  </select>
</div>

  <div class="input-group-prepend col-sm-0">
    <span class="input-group-text" id="filtro-valor-label">Valor:</span>
  </div>
  <input type="text" class="form-control" name="filtro-valor" id="filtro-valor" placeholder="Informe o valor da busca" pattern="[A-Za-z0-9 ]{1,}" aria-describedby="filtro-valor-label"/> 
&nbsp;&nbsp;
<button class="btn btn-outline-info" type="submit" name="filtro-button" id="filtro-button">Consultar</button>
&nbsp;&nbsp;
<button class="btn btn-outline-danger" type="submit" name="filtro-reset" id="filtro-reset">Limpar</button>
</div><br><br>

<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>ID - Aluno</th>
            <th>ID - Curso</th>
            <th>ID - Letra</th>
            <th>Periodo</th>
            <th>Ano</th>
            <th>Semestre</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $sql->fetch(PDO::FETCH_ASSOC) or die("<tr><td colspan='10' style='text-align:center;'>Fim dos resultados</td></tr>")){

            $aluno_id = $row['aluno_id'];
            $turma_id = $row['turma_id'];
            $sql2 = $pdo->query("SELECT nome FROM aluno WHERE id = {$aluno_id}");
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
            $sql3 = $pdo->query("SELECT * FROM turma WHERE id = {$turma_id}");
            $row3 = $sql3->fetch(PDO::FETCH_ASSOC); 
            $curso_id = $row3['curso_id']; 
            $sql4 = $pdo->query("SELECT `nome` FROM `curso` WHERE `id` = {$curso_id}");
            $row4 = $sql4->fetch(PDO::FETCH_ASSOC);
            $aluno_nome = $row2['nome'];
            $curso_nome = $row4['nome'];
            $periodo = $row3['periodo'];
            $letra = $row3['letra'];
            $ano = $row3['ano'];
            $semestre = $row3['semestre'];
            ?>
            <tr>
                <td><?= $aluno_id.' - '.$aluno_nome ?></td>
                <td><?= $curso_id.' - '.$curso_nome ?></td>
                <td><?= $turma_id.' - '.$letra ?></td>
                <td><?= $periodo ?></td>
                <td><?= $ano ?></td>
                <td><?= $semestre ?></td>
                <td>
                   <button type="button" class="btn btn-outline-warning" onclick="window.location.href='alt2_aluno_turma.php?aluno_id=<?= $aluno_id ?>&turma_id=<?=$turma_id?>'">Editar</button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href='exclui_aluno_turma.php?aluno_id=<?= $aluno_id ?>&turma_id=<?=$turma_id?>'">Excluir</button>
                </td>
            </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</div> 
