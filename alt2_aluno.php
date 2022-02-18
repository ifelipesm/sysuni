<?php
include_once 'testar.php';
include_once 'navbar.php';

  if(isset($_GET['id'])){

    $sql = $pdo->query("select * from `aluno` where id = ".$_GET['id']);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    $id = $row['id'];
  	$nome = $row['nome'];
  	$sexo = $row['sexo'];
  	$endereco = $row['endereco'];
  	$telefone = $row['telefone'];
  	$cpf = $row['cpf'];
    $matricula = $row['matricula'];
    $status = $row['status'];

  }
?>
<!DOCTYPE html>
<html>
<head>
<title>SYSUNI - Alteração de dados</title>
</head>

<div class="container-alt">
<h2>Alteração de dados - Aluno</h2><br><br>
<div class="table-responsive-sm">

<!--  Formulario de Alteração  -->
<form method="post" action="altera_aluno.php">    
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
        $sql1 = $pdo->query("SELECT * FROM aluno");
        //var_dump($result);
        while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {
            if($id != $row1['id']){
            ?>
            <tr>
                <td><?= $row1['id']?></td>
                <td><?= $row1['nome'] ?></td>
                <td><?= $row1['sexo'] ?></td>
                <td><?= $row1['endereco'] ?></td>
                <td><?= $row1['telefone'] ?></td>
                <td><?= $row1['cpf'] ?></td>
                <td><?= $row1['matricula'] ?></td>
                <td><?= $row1['status'] ?></td>
            </tr>
            <?php
        }
        else{
        ?>
          <tr class="bg-secondary">

                <td><?= $id;?><input type="hidden" name="hidden_id" value="<?=$id;?>"></td>
                <td><input name="nome" id="nome" type="text"    pattern="[A-Za-z ]{5,}" value="<?=$nome;?>" required></td>
                <td><input type="radio" name="sexo" id="sexo" value="M" <?=$sexo=='M'?'checked':''?> > M
                    <input type="radio" name="sexo" id="sexo" value="F" <?=$sexo=='F'?'checked':''?> > F</td>
                <td><input name="endereco" id="endereco" type="text"   pattern="[A-Za-z ]{10,}" value="<?=$endereco;?>" required></td>
                <td><input name="telefone" id="telefone" type="tel" style="width:7.4em"  maxlength="11" pattern="[0-9]{2}[9]{1}[0-9]{8}" value="<?=$telefone;?>" required></td>
                <td><input name="cpf" id="cpf" type="text" style="width:7em" maxlength="11" pattern="[0-9]{11}" value="<?=$cpf;?>" required></td>
                <td><?= $matricula;?></td>
                <td><input type="radio" name="status" id="status" value="0" <?=$status=='0'?'checked':''?> > 0 
                    <input type="radio" name="status" id="status" value="1" <?=$status=='1'?'checked':''?> > 1</td>
            </tr>
        <?php
          }
        }
        ?>

    </tbody>
</table>
</div><br>
<button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar</button>  
</div>
</form>

</body>
</html>
