<?php
include_once 'testar.php';
include_once 'navbar.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

	$inst = "INSERT INTO aluno(nome,sexo,endereco,telefone,cpf,matricula) values('$nome','$sexo','$endereco','$telefone','$cpf',NULL)";
    $sql = $pdo->query($inst);

}

/*
$ano = 2009;
$semestre = 1;
$id = 1;
$matricula = $ano.$semestre.$id;
$pdo->query("INSERT INTO ALUNO VALUES = (?,?,?,?,?)")
*/
?>

<br>Sucesso no cadastro
<meta http-equiv="refresh" content="2;aluno_turma.php">