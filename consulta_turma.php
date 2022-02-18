<?php  include_once 'testar.php'; include_once 'navbar.php'; ?>

<?php

    if($_SERVER['REQUEST_METHOD'] ==  'POST'){

        if(isset($_POST['filtro-categoria']) && isset($_POST['filtro-valor'])){
         $categoria = $_POST['filtro-categoria'];
         $valor = $_POST['filtro-valor'];

                try{
                $sql = $pdo->query("SELECT * FROM turma WHERE {$categoria} = '$valor' ORDER BY {$categoria} ASC");
                //$total_registros = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                    catch(PDOException $e){
                    $msg = "$e->getMessage()"; // exceção da query
                    echo "<div id='alert-update' class='alert alert-danger' role='alert'>
                    <h3>[Erro] Falha na busca. <br> Log do erro: <?=vardump($msg);?></h3>
                    <meta http-equiv='refresh' content='2;consulta_turma.php'";
                    exit();
                    }
        }
                        else if (isset($_POST['filtro-reset'])) { // Dentro do POST, limpeza de filtro 
                            $sql = $pdo->query("SELECT * FROM turma ORDER BY id ASC");
                        }
                        else{ echo "<meta http-equiv='refresh' content='0;consulta_turma.php'";}
                        }
    else { // Fora do POST, iteracao 0
        $sql = $pdo->query("SELECT * FROM turma ORDER BY id ASC");
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Sysuni - Consulta de dados</title>
</head>

<div class="container-alt">
<h2>CONSULTA DE DADOS - TURMA</h2><br><br>

<form method="POST" action="consulta_turma.php">


<div class="input-group mb-3">
  <div class="input-group-prepend col-sm-4">
    <label class="input-group-text" for="filtro-categoria">Informe a categoria:</label>
    <select class="custom-select" name="filtro-categoria" id="filtro-categoria" required>
    <option disabled selected value="--">--</option>
    <option value="id">id</option>
    <option value="curso_id">curso_id</option>
    <option value="letra">letra</option>
    <option value="periodo">periodo</option>
    <option value="ano">ano</option>
    <option value="semestre">semestre</option>
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
            <th>ID</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Periodo</th>
            <th>Ano</th>
            <th>Semestre</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $sql->fetch(PDO::FETCH_ASSOC) or die("<tr><td colspan='10' style='text-align:center;'>Fim dos resultados</td></tr>")){
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <?php //Sub Query - Entrada = ID do curso / Saida = Nome do curso
                $cid = $row['curso_id']; 
                $inst = "SELECT `nome` FROM `curso` WHERE `id` = {$cid}";
                $sql2 = $pdo->query($inst);
                $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
                ?>
                <td><?= $cid .' - '. $row2['nome'] ?></td>
                <td><?= $row['letra'] ?></td>
                <td><?= $row['periodo'] ?></td>
                <td><?= $row['ano'] ?></td>
                <td><?= $row['semestre'] ?></td>
                <td>
                   <button type="button" class="btn btn-outline-warning" onclick="window.location.href='alt2_turma.php?id=<?= $row['id'] ?>'">Editar</button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="window.location.href='exclui_turma.php?id=<?= $row['id'] ?>'">Excluir</button>
                </td>
            </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</div> 