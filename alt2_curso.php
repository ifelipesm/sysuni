<?php
include_once 'testar.php';
include_once 'navbar.php';

 if(isset($_GET['id'])){

      $sql = $pdo->query("SELECT * FROM `curso` WHERE id = ".$_GET['id']);
      $row = $sql->fetch(PDO::FETCH_ASSOC);

      $id = $row['id'];
      $nome = $row['nome'];
      $sigla = $row['sigla'];
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>SYSUNI - Alteração de dados</title>
</head>
<body>

	<!------ FORMULARIO ----->

<form method="post" action="altera_curso.php">
	

<div class="container-alt ">
<h2><caption>Alteração de dados - Curso</caption></h2><br>
<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Sigla</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = $pdo->query("SELECT * FROM curso");
        //var_dump($result);
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        	if($id != $row['id']){
        		?>
        		<tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['sigla'] ?></td>
                </tr>
            <?php
            }
            else{
            ?>
            <tr class="bg-danger">
                <td><?=$id;?><input type="hidden" name="hidden_id" value="<?=$id;?>"></td>
                <td><input name="nome" id="nome" type="text" style="width: 20em" placeholder="  Digite o nome aqui"   pattern="[A-Za-z ]{5,}" value="<?=$nome;?>" required><br></td>
                <td><input name="sigla" id="sigla" type="text" style="width: 20em" placeholder=" Digite a sigla aqui" pattern="[A-Za-z ]{2,4}" value="<?=$sigla;?>" required></td>
            </tr>
            <?php }} ?>

    </tbody>
</table>
</div>
<button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar</button> 
</div>
</form>
</body>
</html>