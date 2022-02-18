<?php
include_once 'testar.php';
include_once 'navbar.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$nome = $_POST['nome'];
$sigla = $_POST['sigla'];

	$inst = "INSERT INTO curso(nome,sigla) values('$nome','$sigla')";
    $sql = $pdo->query($inst);
}

?>

<br>Sucesso no cadastro
<meta http-equiv="refresh" content="2;turma.php">