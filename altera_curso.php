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
$sigla = $_POST['sigla'];

try{
   $inst = " UPDATE curso set nome = '$nome', sigla = '$sigla' where id = '$id' ";
    $sql = $pdo->query($inst);

?>   

		<div id="alert-update" class="alert alert-success" role="alert">
		<h3>Sucesso na alteração</h3>
        <meta http-equiv="refresh" content="2;alt_curso.php">
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

