<?php
include_once 'testar.php';
include_once 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>SYSUNI - CADASTRO</title>
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $i = 0;
	$turma_id = $_POST['turma_id'];

	$alunos = $_POST['checkaluno'];
	$i=0;
	try{
	while (isset($alunos[$i])) {
		$aluno = $alunos[$i];
		$matricula = $turma_id."-".$aluno;
	    $sql = $pdo->prepare("INSERT INTO `aluno_turma`(turma_id,aluno_id) VALUES (?,?)");
	    $sql->execute(array($turma_id,$aluno));
	    $sql2 = $pdo->query("UPDATE `aluno` SET matricula = '$matricula' where id = " . $aluno);

	    $i++;
	    }
        ?>
    <div id="alert-update" class="alert alert-success" role="alert">
    <h3>Sucesso na alteração</h3>
    <meta http-equiv="refresh" content="2;aluno_turma.php">
    </div>
    <?php
    }
    catch(PDOException $e){
    ?>  
    <div id="alert-update"  class="alert alert-danger" role="alert">
    <h3>Não obteve êxito na alteração.<br></h3>
    </div>
    <?php
    exit();
  }
}
?>

</body>
</html>