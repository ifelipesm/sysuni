<?php
include_once 'testar.php';
include_once 'navbar.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$curso_id = $_POST['curso_id'];
$letra = $_POST['letra'];
$periodo = $_POST['periodo'];
$ano = $_POST['ano'];
$semestre = $_POST['semestre'];

	$inst = "INSERT INTO turma(curso_id,letra,periodo,ano,semestre) values('$curso_id','$letra','$periodo','$ano','$semestre')";
    $sql = $pdo->query($inst);
}
?>
<br>Sucesso no cadastro
<meta http-equiv="refresh" content="2;turma.php">