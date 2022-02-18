<?php 
include_once 'testar.php';
include_once 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
$id = $_GET['id'];

try{
$sql = $pdo->prepare("DELETE FROM `aluno` WHERE `id` = '$id'");
$sql->execute();
?>
<br>
Dados Removidos com Sucesso
<meta http-equiv="refresh" content="2;alt_aluno.php">
<?php
}

catch (PDOException $e){
	?>
	<br>
    (ERRO) O Aluno selecionado está vinculado a uma turma! Por favor, desvincule-o da turma.
    
<meta http-equiv="refresh" content="5;alt_aluno.php">
<?php
}
}
?>

</body>
</html>