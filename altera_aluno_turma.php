<?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Atualizando...</title>
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $turma = $_POST['turma_id'];
  $aluno = $_POST['aluno_id'];
  $old_turma = $_POST['old_turma'];
  
  try{
        $id = $aluno.$old_turma;
        $sql = $pdo->query("UPDATE `aluno_turma` SET `turma_id` = '$turma' WHERE concat(`aluno_id`,`turma_id`) = '$id'");
      
      
?>
    <div id="alert-update" class="alert alert-success" role="alert">
    <h3>Sucesso na alteração<br></h3>
    <meta http-equiv="refresh" content="2;consulta_aluno_turma.php">
    </div>
<?php
    }
    catch(PDOException $e){
?>  
    <div id="alert-update"  class="alert alert-danger" role="alert">
    <h3>Não obteve êxito na alteração.<br>Log do erro: <?=vardump($e->getMessage());?></h3>
    </div>
<?php
    exit();
  }
}
?>

</body>
</html>

