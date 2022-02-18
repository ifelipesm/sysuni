<?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<?php
    $turma_id = $_GET['turma_id'];
    $aluno = $_GET['aluno_id'];
    try{
	$sql2 = $pdo->query("DELETE FROM aluno_turma WHERE aluno_id = '$aluno' AND turma_id = '$turma_id'");
    ?>
    <div class="alert alert-success" role="alert">
    <h3>Sucesso na alteração</h3>
    <meta http-equiv="refresh" content="2;consulta_aluno_turma.php">
    </div>
	<?php
    }
    catch (Exception $e){
	?>  
    <div class="alert alert-danger" role="alert">
    <h3>Não obteve êxito na alteração.<br>Log do erro: <?=vardump($e->getMessage());?></h3>
    </div>
    <?php
    exit();
    }
?>