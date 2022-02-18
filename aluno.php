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

<form method="post" action="aluno2.php">
	
<div class="container-alt">
<H2>CADASTRO DE ALUNOS</H2>
<br>

<div class="row">
<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="nome" id="label_nome">Nome Completo:</span>
  </div>
  <input type="text" name="nome" id="nome" class="form-control" placeholder=" Informe o nome completo"  pattern="[A-Za-z ]{5,}" aria-describedby="label_nome" required>
</div>

<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="endereco" id="label_endereco">Endereço:</span>
  </div>
  <input type="text" name="endereco" id="endereco" class="form-control" placeholder=" Digite seu endereço aqui"  pattern="[A-Za-z ]{10,}" aria-describedby="label_endereco" required>
</div>
</div>
    


<div class="w-100"></div>


<div class="row">
<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="telefone" id="label_telefone">Telefone:</span>
  </div>
  <input type="text" name="telefone" id="telefone" class="form-control" placeholder=" (00)91234-5678" maxlength="11" pattern="[0-9]{2}[9]{1}[0-9]{8}" aria-describedby="label_telefone" required>
</div>

<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="cpf" id="label_cpf">CPF:</span>
  </div>
  <input type="text" name="cpf" id="cpf" class="form-control" placeholder="123.456.789-11" maxlength="11" pattern="[0-9]{11}" aria-describedby="label_cpf" required>
</div>
     </div>
     <div class="w-100"></div>
    
    <div class="row">
      <div class="input-group col-sm mb-3">
    <span class="input-group-text" id="basic-addon1">Sexo:</span>
    </div>

    <div class="custom-control custom-radio col-sm">
      <input type="radio" id="masculino" name="sexo" class="custom-control-input" value="M">
      <label class="custom-control-label" for="masculino">Masculino</label>
    </div>
    <div class="custom-control custom-radio col-sm">
      <input type="radio" id="feminino" name="sexo" class="custom-control-input" value="F">
      <label class="custom-control-label" for="feminino">Feminino</label>
    </div>
    <div class="col-sm"></div>
  </div>

<button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar</button> 

</div>
</form>

</body>
</html>
