<?php
include_once 'testar.php';
include_once 'navbar.php';
?> 

 <div class='container-alt'>    
   <div class="row">    
    <h2 class="text-center">Paginação de Dados</h2><hr>   
    
    <?php if (!empty($dados)): ?>  
     <table class="table table-hover table-dark">    
     <thead>    
       <tr>    
          <th>#</th>
          <th>Nome</th>
          <th>Curso</th>
          <th>Turma</th>
          <th>Periodo</th>
          <th>Ano</th>
          <th>Semestre</th>
          <th>Opção</th>   
       </tr>    
     </thead>    
     <tbody> 

  <?php
/* Constantes de configuração */  
 define('QTDE_REGISTROS', 5);   
 define('RANGE_PAGINAS', 1);   
   
 /* Recebe o número da página via parâmetro na URL */  
 $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;   
   
 /* Calcula a linha inicial da consulta */  
 $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
   
 /* Instrução de consulta para paginação com MySQL */  
 $sql = "SELECT * FROM aluno_turma LIMIT {$linha_inicial}, " . QTDE_REGISTROS;  
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
       <?php foreach($dados as $tabela):?>   
       <tr>    
                <td><?= $aluno_id ?></td>
                <td><?= $aluno_nome ?></td>
                <?php
                $sql3 = $pdo->query("SELECT * FROM turma WHERE id = {$turma_id}");
                $row3 = $sql3->fetch(PDO::FETCH_ASSOC); 
                $cid = $row3['curso_id']; 
                $sql4 = $pdo->query("SELECT `nome` FROM `curso` WHERE `id` = {$cid}");
                $row4 = $sql4->fetch(PDO::FETCH_ASSOC);
                ?>
                <td><?= $cid.' - '.$row4['nome']?></td>
                <td><?= $turma_id.' - '.$row3['letra'] ?></td>
                <td><?= $row3['periodo'] ?></td>
                <td><?= $row3['ano'] ?></td>
                <td><?= $row3['semestre'] ?></td>
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