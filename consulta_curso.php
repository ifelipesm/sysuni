<?php  include_once 'testar.php'; include_once 'navbar.php'; ?>

<?php

    if($_SERVER['REQUEST_METHOD'] ==  'POST'){

        if(isset($_POST['filtro-categoria']) && isset($_POST['filtro-valor'])){
         $categoria = $_POST['filtro-categoria'];
         $valor = $_POST['filtro-valor'];

                try{
                $sql = $pdo->query("SELECT * FROM curso WHERE {$categoria} = '$valor' ORDER BY {$categoria} ASC");
                //$total_registros = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                    catch(PDOException $e){ // exceção da query
                    echo "<div id='alert-update' class='alert alert-success' role='alert'>
                    <h3>[Erro] Falha na busca. <br> Log do erro: <?=vardump($e->getMessage());?></h3>
                    <meta http-equiv='refresh' content='2;consulta_curso.php'";
                    exit();
                    }
        }
                        else if (isset($_POST['filtro-reset'])) { // Dentro do POST, limpeza de filtro 
                            $sql = $pdo->query("SELECT * FROM curso ORDER BY nome ASC");
                        }
                        else{ echo "<meta http-equiv='refresh' content='0;consulta_curso.php'";}
    }
    else { // Fora do POST, iteracao 0
        $sql = $pdo->query("SELECT * FROM curso ORDER BY id ASC");
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Sysuni - Consulta de dados</title>
</head>

<div class="container-alt">
<h2>CONSULTA DE DADOS - CURSO</h2><br><br>

<form method="POST" action="consulta_curso.php">


<div class="input-group mb-3">
  <div class="input-group-prepend col-sm-4">
    <label class="input-group-text" for="filtro-categoria">Informe a categoria:</label>
    <select class="custom-select" name="filtro-categoria" id="filtro-categoria" required>
    <option disabled selected value="--">--</option>
    <option value="id">id</option>
    <option value="nome">nome</option>
    <option value="sigla">sigla</option>
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
    <?php while($row = $sql->fetch(PDO::FETCH_ASSOC) or die("<tr><td colspan='10' style='text-align:center;'>Fim dos resultados</td></tr>")){
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
</div> 