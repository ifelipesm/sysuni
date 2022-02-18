<!-- consulta com filtro de categoria e valor para alunos (trocar as urls 'queries')

  <?php  include_once 'testar.php'; include_once 'navbar.php'; ?>

<?php

if($_SERVER['REQUEST_METHOD'] ==  'POST'){

 if(isset($_POST['filtro-categoria']) && isset($_POST['filtro-valor'])){
 $categoria = $_POST['filtro-categoria'];
 $valor = $_POST['filtro-valor'];
 $sql = $pdo->query("SELECT * FROM aluno WHERE {$categoria} LIKE '%{$valor}%' ORDER BY {$categoria} ASC");
 $total_registros = $sql->fetchAll(PDO::FETCH_ASSOC);
 }
 else if (isset($_POST['filtro-reset'])) {
  $sql = $pdo->query("SELECT * FROM aluno ORDER BY nome ASC");
 }
 else{
  echo "<meta http-equiv='refresh' content='0;queries.php'";
  exit();
 }
}
else{
  $sql = $pdo->query("SELECT * FROM aluno ORDER BY nome ASC");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Sysuni - Consulta de dados</title>
</head>

<div class="container-alt">
<h2>CONSULTA DE DADOS - ALUNO</h2><br><br>

<form method="POST" action="queries.php">


<div class="input-group mb-3">
  <div class="input-group-prepend col-sm-4">
    <label class="input-group-text" for="filtro-categoria">Informe a categoria:</label>
    <select class="custom-select" name="filtro-categoria" id="filtro-categoria" required>
    <option selected disabled>Escolha o filtro:</option>
  <option value="id">id</option>
  <option value="nome">nome</option>
  <option value="sexo">sexo</option>
  <option value="endereco">endereco</option>
  <option value="telefone">telefone</option>
  <option value="cpf">cpf</option>
  <option value="matricula">matricula</option>
  <option value="status">status</option>
  </select>
</div>

  <div class="input-group-prepend col-sm-0">
    <span class="input-group-text" id="filtro-valor-label">Valor:</span>
  </div>
  <input type="text" class="form-control" name="filtro-valor" id="filtro-valor" placeholder="Informe o valor do filtro" pattern="[A-Za-z0-9 ]{1,}" aria-describedby="filtro-valor-label"/> 
&nbsp;&nbsp;
<button class="btn btn-outline-info" type="submit" name="filtro-button" id="filtro-button">Confirmar</button>
&nbsp;&nbsp;
<button class="btn btn-outline-danger" type="submit" name="filtro-reset" id="filtro-reset">Limpar</button>
</div><br><br>

<div class="table-responsive-sm">
    
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Matricula</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
  <?php while($row = $sql->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['sexo'] ?></td>
                <td><?= $row['endereco'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td><?= $row['cpf'] ?></td>
                <td><?= $row['matricula'] ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
  <?php } ?>
    </tbody>
</table>
</div>
</div>    
-->



<!-- enviando via post varias checkbox para update (incompleto)
  <?php
include_once 'testar.php';
include_once 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Atualizando...</title>
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $turmas = $_POST['turmas'];
  $alunos = $_POST['alunos'];
  $old_turmas = $_POST['old_turmas'];
  $m1 = strlen($turmas);
  $m2 = strlen($alunos);
  $m3 = strlen($old_turmas);
  $i = 0;
  $j = 0;
  
  try{
        while (isset($alunos[$i][$j])) {
          $aluno = $alunos[$i][$j];
          $turma = $turmas[$i][$j];
          $old_turma = $old_turmas[$i][$j];
          $id = $aluno.$old_turma;
          $sql = $pdo->query("UPDATE `aluno_turma` SET `turma_id` = '$turma' WHERE concat(`aluno_id`,`turma_id`) = '$id'");
          $j++;
          if($j = $m1 || $j = $m2 || $j = $m3){
          $i++;  
          }
          }
?>
    <div id="alert-update" class="alert alert-success" role="alert">
    <h3>Sucesso na alteração <br><?php var_dump($sql);?></h3>
    <meta http-equiv="refresh" content="6;alt_aluno_turma.php">
    </div>
<?php
    }
    catch(PDOException $e){
?>  
    <div id="alert-update"  class="alert alert-danger" role="alert">
    <h3>Não obteve êxito na alteração.<br>Log do erro: <?=vardump($e->getMessage());?></h3>
    </div>
<?php
    exit();
  }
}
?>

</body>
</html>

-->

<!--  MODELO PAGINAÇÃO
<?php   

 /* Constantes de configuração */  
 define('QTDE_REGISTROS', 5);   
 define('RANGE_PAGINAS', 1);   
   
 /* Recebe o número da página via parâmetro na URL */  
 $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;   
   
 /* Calcula a linha inicial da consulta */  
 $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
   
 /* Instrução de consulta para paginação com MySQL */  
 $sql = "SELECT EDITARAQUI FROM EDITARAQUI LIMIT {$linha_inicial}, " . QTDE_REGISTROS;  
 $stm = $pdo->prepare($sql);   
 $stm->execute();   
 $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
   
 /* Conta quantos registos existem na tabela */  
 $sqlContador = "SELECT COUNT(*) AS total_registros FROM EDITARAQUI";   
 $stm = $pdo->prepare($sqlContador);   
 $stm->execute();   
 $valor = $stm->fetch(PDO::FETCH_OBJ);   
   
 $primeira_pagina = 1;   
 $ultima_pagina  = ceil($valor->total_registros / QTDE_REGISTROS);     
 $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual -1 :  ;   
 $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 :  ;  
 $range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;   
 $range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;   
   
 /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */   
 $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? '' : 'hidden'; 
   
 /* Verifica se vai exibir o botão "Anterior" e "Último" */   
 $exibir_botao_final = ($range_final > $pagina_atual) ? '' : 'hidden';  
   
 ?>   

 <div class='container'>    
   <div class="row">    
    <h1 class="text-center">Paginação de Dados</h1><hr>   
    
    <?php if (!empty($dados)): ?>  
     <table class="table table-striped table-bordered">    
     <thead>    
       <tr class='active'>    
        <th>Código</th>    
        <th>Título</th>    
        <th>Autor</th>    
        <th>Prévia</th>    
        <th>Data</th>    
       </tr>    
     </thead>    
     <tbody>    
       <?php foreach($dados as $tabela):?>   
       <tr>    
        <td><?=$tabela->id?></td>    
        <td><?=$tabela->titulo?></td>    
        <td><?=$tabela->autor?></td>    
        <td><?=$tabela->previa?></td>    
        <td><?=$tabela->data?></td>    
       </tr>    
       <?php endforeach; ?>   
     </tbody>    
     </table>    
     
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>

     <div class='box-paginacao'>     
       <a type='<?=$exibir_botao_inicio?>' href="EDITARAQUI.php?page=<?=$primeira_pagina?>" title="Primeira Página">Primeira</a>    
       <a type='<?=$exibir_botao_inicio?>' href="EDITARAQUI.php?page=<?=$pagina_anterior?>" title="Página Anterior">Anterior</a>     
   
      <?php  
      /* Loop para montar a páginação central com os números */   
      for ($i=$range_inicial; $i <= $range_final; $i++){   
        $destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
        ?>   
        <a class='box-numero <?=$destaque?>' href="EDITARAQUI.php?page=<?=$i?>"><?=$i?></a>    
      <?php } ?>    
   
       <a type='<?=$exibir_botao_final?>' href="EDITARAQUI.php?page=<?=$proxima_pagina?>" title="Próxima Página">Próxima</a>    
       <a type='<?=$exibir_botao_final?>' href="EDITARAQUI.php?page=<?=$ultima_pagina?>" title="Última Página">Último</a>    
     </div>   
    <?php else: ?>   
     <p class="bg-danger">Nenhum registro foi encontrado!</p>  
    <?php endif; ?>   
   </div>    
 </div>    
 </body>    
 </html>  
-->

<!--  BACKUP ALTERA ALUNO-TURMA
<?php
include_once('testar.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>SYSUNI - Alteração de dados</title>
</head>

<body>

<?php include 'navbar.html'?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

      if(isset($_POST['alterar']) && isset($_POST['checkaluno'])){
      $alunos = $_POST['checkaluno'];
      $i = 0;
        while (isset($alunos[$i])) {
        $aluno = $alunos[$i];
        $sql = $pdo->query("SELECT turma_id FROM aluno_turma WHERE aluno_id = '$aluno'");
          while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $turma = $row['turma_id'];
            $old_turmas = $row['turma_id'];
            $sql2 = $pdo->query("SELECT nome FROM aluno WHERE id = '$aluno'");
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
            $nome = $row2['nome'];
            ?>
  
            <form method="POST" action="altera_aluno_turma.php">
            <div class="container-alt">
                    <H2>Alteração de dados - Aluno em Turma </H2><br> 
          <div id="input-alt2-aluno-turma" class="input-group row-px-lg-5 ">
            <div class="input-group-prepend col-sm-6">
              <span class="input-group-text" for="turmas" id="label_turmas"><?=$nome?>:</span>
            </div>
            <div class="col-sm-6">
            <input type="text" name="turmas" id="turmas" class="form-control" placeholder="Defina o novo ID de turma"  pattern="[0-9]{1,}" aria-describedby="label_turmas" required>
            </div>
          </div>
          <br>
            <input type='hidden' name='alunos' value='<?=$aluno;?>'>
            <input type='hidden' name='old_turmas' value='<?=$old_turmas;?>'>
          <button type="submit" id="enviar" name="enviar" class="btn btn-outline-primary">Enviar</button>
            </div>
          </form>

          <?php
          }
          $i++;
            }
        }
    else if(isset($_POST['remover']) && isset($_POST['checkaluno'])){

      try{
      $alunos = $_POST['checkaluno'];
      $turma_id = $_POST['turma_id'];
      $i = 0;
        while (isset($alunos[$i])) {
        $aluno = $alunos[$i];
        $turma = $turma_id[$i];
        $sql2 = $pdo->query("DELETE FROM aluno_turma WHERE aluno_id = '$aluno' AND turma_id = '$turma_id'");
        $i++;
        }
          ?>
      <div class="alert alert-success" role="alert">
      <h3>Sucesso na alteração</h3>
      <meta http-equiv="refresh" content="2;alt_aluno_turma.php">
      </div>
    <?php
    }

    catch (PDOException $e){
    ?>  
      <div class="alert alert-danger" role="alert">
      <h3>Não obteve êxito na alteração.<br>Log do erro: <?=vardump($e->getMessage());?></h3>
      </div>
      <?php
        exit();
      }
    }
    else{ echo '<div class="container-login"><div class="alert alert-danger" role="alert">
      <h3>[Erro] Nenhuma checkbox selecionada.</h3>
      </div></div><meta http-equiv="refresh" content="2;alt_aluno_turma.php">';}
}
?>

</body>
</html>
-->
