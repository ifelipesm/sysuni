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

$id = $_POST['hidden_id'];
$curso_id = $_POST['curso_id'];
$letra = $_POST['letra'];
$periodo = $_POST['periodo'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];

   try{
   $inst = "UPDATE turma set curso_id = '$curso_id',letra = '$letra', periodo = '$periodo', ano = '$ano', semestre = '$semestre' where id = '$id' ";
    $sql = $pdo->query($inst);

?>   

		<div id="alert-update" class="alert alert-success" role="alert">
		<h3>Sucesso na alteração</h3>
    <meta http-equiv="refresh" content="2;alt_turma.php">
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


