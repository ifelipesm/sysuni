<?php include_once 'testar.php'; include 'navbar.php'; ?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

      $sql = $pdo->query("SELECT * FROM turma WHERE id = '$id'");
      $row = $sql->fetch(PDO::FETCH_ASSOC);


$id = $row['id'];      
$curso_id = $row['curso_id'];
$letra = $row['letra'];
$periodo = $row['periodo'];
$ano = $row['ano'];
$semestre = $row['semestre'];
}
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>SYSUNI - ALTERAÇÃO DE DADOS</title>
</head>


<div class="container-alt">
<h2>Alteração de dados - Turma</h2><br>
<div class="table-responsive-sm">
    
<form method="post" action="altera_turma.php">
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
        $sql1 = $pdo->query("SELECT * FROM turma");
        while ($row1 = $sql1->fetch(PDO::FETCH_ASSOC)) {
                if($id !=$row1['id']){ //Compara o id encontrado com o id via metodo Post 
                ?>
                <tr>
                    <td><?= $row1['id'] ?></td>
                    <?php
                    $cid = $row1['curso_id']; 
                    $sql2 = $pdo->query("SELECT `nome` FROM `curso` WHERE `id` = '$cid'");
                    $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <td><?= $cid.' - '.$row2['nome']?></td>
                    <td><?= $row1['letra'] ?></td>
                    <td><?= $row1['periodo'] ?></td>
                    <td><?= $row1['ano'] ?></td>
                    <td><?= $row1['semestre'] ?></td>
                </tr>
            <?php 
            }

                else{ //Abre a edicao para o id que provem do metodo Get
                ?>
                
                <tr class="bg-secondary">

                <td><?= $row1['id'] ?></td>
                <td>
                  <input type="hidden" name="hidden_id" value="<?=$id;?>">
                  <select name="curso_id" id="curso_id">
                 <?php
                  $sql = $pdo->query("SELECT * FROM `curso`");
                  while ($row = $sql->fetch(PDO::FETCH_OBJ)){
                  echo "<option value='{$row->id}' <?=$curso_id=='$row->id'?'selected':''?> {$row->id} - {$row->nome}</option>";
                  }
                ?>
                </select>
                </td>
                <td>
                <input name="letra" id="letra" type="text"   pattern="[A-Z]{1}" value="<?=$letra;?>" required><br>
                </td>
                <td>
                <input name="periodo" id="periodo" type="text"   pattern="[1-9]{1}|10" value="<?=$periodo;?>" required><br> 
                </td>
                <td>
                <input name="ano" id="ano" type="text"  pattern="[0-9]{4}" value="<?=$ano;?>" required><br> 
                </td>
                <td>
                <select id="semestre" name="semestre">
                <option value="--" disabled>--</option>
                <option value="1" <?=$semestre=='1'?'selected':''?> >1</option>
                <option value="2" <?=$semestre=='2'?'selected':''?> >2</option></select>  
                </td>
                </tr>
                <?php
                }
              } ?>

              </tbody>
            </table>         
          </div>
          <button type="submit" name="enviar" class="btn btn-outline-primary" value="enviar">Enviar</button>  
        </div>
      </form>
  </body>
</html>