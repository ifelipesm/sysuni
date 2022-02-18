<?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<title>SYSUNI - CADASTRO</title>

	<!------ FORMULARIO ----->

<form method="post" action="turma2.php">

<div class="container-alt">
<H2>CADASTRO DE TURMA</H2>
<br>

<div class="row">
<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="curso_id">Curso:</label>
  </div>
  <select class="custom-select" id="curso_id" name="curso_id" required>
    <option value="--" selected disabled>--</option>
             <?php
              $sql = $pdo->query("SELECT * FROM `curso`");
              while ($row = $sql->fetch(PDO::FETCH_OBJ)){
              echo "<option value='{$row->id}'>{$row->id} - {$row->nome}</option>";
              }
            ?>
  </select>
</div>

<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="periodo" id="label_periodo">Periodo:</span>
  </div>
  <input type="text" name="periodo" id="periodo" class="form-control" placeholder="Informe um periodo de 1 a 10"  pattern="[1-9]{1}|10" aria-describedby="label_periodo" required>
</div>
</div>

<div class="row">

<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="ano" id="label_ano">Ano:</span>
  </div>
  <input type="text" name="ano" id="ano" class="form-control" placeholder="Informe o ano do curso"  pattern="[0-9]{4}" aria-describedby="label_ano"  required>
</div>

<div class="input-group col-sm mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="semestre">Semestre: </label>
  </div>
  <select class="custom-select" name="semestre" id="semestre" required>
    <option value="--" selected disabled>--</option>
    <option value="1">1</option>
    <option value="2">2</option>
  </select>
</div>
</div>

<div class="row">
<div class="input-group col-sm-6 mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" for="letra" id="label_letra">Letra:</span>
  </div>
  <input type="text" name="letra" id="letra" class="form-control" placeholder="  Informe a letra da turma aqui"  pattern="[A-Z]{1}" aria-describedby="label_letra" required>
</div>
</div><br>

<button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar</button> 
</div>
</form>

</body>
</html>
