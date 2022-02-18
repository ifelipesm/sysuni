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
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$status = $_POST['status'];

try{
   $inst = "UPDATE `aluno` SET `nome` = '$nome' , `sexo` = '$sexo' , `endereco` = '$endereco' , `telefone` = '$telefone' , `cpf` = '$cpf', `status` = '$status' WHERE `id` = '$id'";
    $sql = $pdo->query($inst);

   ?>   
    <div class="container-alt">
		<div id="alert-update" class="alert alert-success" role="alert">
		<h3>Sucesso na alteração</h3>
    <meta http-equiv="refresh" content="2;alt_aluno.php">
		</div>
    </div>

   <?php
   }
   catch(PDOException $e){
	?>
    <div class="container-alt">  
		<div id="alert-update"  class="alert alert-danger" role="alert">
		<h3>Não obteve êxito na alteração.<br>Log do erro: <?=vardump($e->getMessage());?></h3>
		</div>
    </div>
		<?php
		exit();
	}

	}
	?>

</body>
</html>

