<?php include_once 'testar.php'; include_once 'navbar.php'; ?>

<?php
if(isset($_GET['aluno_id'])){

$aluno_id = $_GET['aluno_id'];
$turma_id = $_GET['turma_id'];
$old_turma = $turma_id;
try{
$sql2 = $pdo->query("SELECT nome FROM aluno WHERE id = {$aluno_id}");
$row2 = $sql2->fetch(PDO::FETCH_ASSOC);
$sql3 = $pdo->query("SELECT * FROM turma WHERE id = {$turma_id}");
$row3 = $sql3->fetch(PDO::FETCH_ASSOC); 
$curso_id = $row3['curso_id']; 
$sql4 = $pdo->query("SELECT `nome` FROM `curso` WHERE `id` = {$curso_id}");
$row4 = $sql4->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e){
echo "<div id='alert-update' class='alert alert-danger' role='alert'>
                    <h3>[Erro] Falha na query. <br> Log do erro: <?=vardump($e->getMessage());?></h3>
                    <meta http-equiv='refresh' content='2;consulta_aluno_turma.php'";
                    exit();	
}
$aluno_nome = $row2['nome'];
$curso_nome = $row4['nome'];
$periodo = $row3['periodo'];
$letra = $row3['letra'];
$ano = $row3['ano'];
$semestre = $row3['semestre'];

}
?>
		<form method="POST" action="altera_aluno_turma.php" >  <!-- Formulario -->

		<div class="container-alt">
		<H2>Alteração de dados - Aluno em Turma</H2><br> 
		<div class="table-responsive-sm">
		    
		<table class="table table-hover table-dark">
		    <thead>
		        <tr>
		            <th>ID - Aluno</th>
		            <th>ID - Curso</th>
		            <th>Turma</th>
		            <th>Periodo</th>
		            <th>Ano</th>
		            <th>Semestre</th>
		        </tr>
		    </thead>
		    <tbody>

		    <tr class="bg-danger" id="alt-linha">
            <td><?= $aluno_id.' - '.$aluno_nome ?></td>
            <td><?= $curso_id.' - '.$curso_nome ?></td>
            <td><input type="text" name="turmas" id="turmas" placeholder="Defina o novo ID" value="<?=$turma_id;?>" required></td>
            <td><?= $periodo ?></td>
            <td><?= $ano ?></td>
            <td><?= $semestre ?></td>
            </tr>
				</tbody>
				</table>
				</div>

				  <input type='hidden' name='aluno' value='<?=$aluno_id;?>'>
				  <input type='hidden' name='old_turma' value='<?=$old_turma;?>'>
				  <button type="submit" name="enviar" class="btn btn-outline-primary">Enviar</button>

				</form> <!-- Fim do Formulario -->
				</body>
				</html>

