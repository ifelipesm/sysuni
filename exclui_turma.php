<?php
include_once 'testar.php';
include_once 'navbar.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
$id = $_GET['id'];

try{
$sql = $pdo->prepare("DELETE FROM `turma` WHERE `id` = '$id'");
$sql->execute();
?>
<br>
Dados Removidos com Sucesso
<meta http-equiv="refresh" content="2;alt_turma.php">
<?php
}

catch (PDOException $e){
	?>
	<br>
    Falha na remoção dos dados -> 
    <?php
    echo $e->getMessage();
    ?>
<meta http-equiv="refresh" content="5;alt_turma.php">
<?php
}
}
?>
