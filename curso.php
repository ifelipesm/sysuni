<?php
include_once 'testar.php';
include_once 'navbar.php';  
?>

<!DOCTYPE html>
<html>
<head>
	<title>SYSUNI - CADASTRO</title>
</head>

	<!------ FORMULARIO ----->

<form method="post" action="curso2.php">
<input type="hidden" name="hidden_id" value="<?=$id;?>">

<div class="container-alt">
<H2>CADASTRO DE CURSOS</H2> 
<br>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="nome" id="label_nome">Nome:</span>
  </div>
  <input type="text" name="nome" id="nome" class="form-control" placeholder="  Digite o nome aqui"   pattern="[A-Za-z ]{5,}" aria-describedby="label_ano"  required>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="sigla" id="label_sigla">Sigla:</span>
  </div>
  <input type="text" name="sigla" id="sigla" class="form-control" placeholder=" Digite a sigla aqui" pattern="[A-Za-z ]{2,4}" aria-describedby="label_ano"  required>
</div>
<br>
<button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar</button> 
</div>
</form>

</body>
</html>
