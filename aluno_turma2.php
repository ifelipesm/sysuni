<?php
include_once 'testar.php';
include_once 'navbar.php';

if(isset($_GET['t_id']))
$t_id = $_GET['t_id'];
$aluno = '';

/*
if(isset($_GET['id'])){

      $aluno = $pdo->query("select * from aluno "
              . "where id = ".$_GET['id']);
      $row = $pdo->fetch_array($aluno);
      extract($row);
  
  }  else {
      $id= $nome = $sexo = $endereco = $telefone = $cpf = $matricula = '';
  }
*/
?>

  <!DOCTYPE html>
<html>
<head>
	<title>SYSUNI - CADASTRO</title>
</head>

<form method="POST" action="aluno_turma3.php">

<input type="hidden" name="turma_id" value="<?=$t_id?>">

<div class="container-alt">
<H2>Inserir aluno em turma - Selecione o aluno</H2>
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
	<thead>
        <tr>
            <th>#</th>
            <th>Aluno</th>
            <th>Opção</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = $pdo->query("SELECT * FROM `aluno`");
               while($row = $sql->fetch(PDO::FETCH_ASSOC)){
               ?>
               <tr>
               <td>
                <?php echo"{$row['id']}";?>
               </td>
               <td>
                <?php echo "{$row['nome']}";
                ?>
               </td>
               <td>
               <?php
              echo "<input type='checkbox' id='checkaluno' name='checkaluno' value='{$row['id']}'>";
               ?>
               </td>
               </tr>
           <?php  } ?>

</tbody>
</table>
</div>
<button type="submit" name="confirmar" class="btn btn-primary">Confirmar</button>
</div>
</form>

</body>
</html>
