<?php include_once 'backgrounds.php'; ?>

 <!--  Navbar  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="principal.php">SYSUNI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inserir
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="aluno.php">Aluno</a>
          <a class="dropdown-item" href="turma.php">Turma</a>
          <a class="dropdown-item" href="aluno_turma.php">Aluno-Turma</a>
          <a class="dropdown-item" href="curso.php">Curso</a>
        </div>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Alterar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="alt_aluno.php">Aluno</a>
          <a class="dropdown-item" href="alt_turma.php">Turma</a>
          <a class="dropdown-item" href="alt_aluno_turma.php">Aluno-Turma</a>
          <a class="dropdown-item" href="alt_curso.php">Curso</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="consulta_aluno.php">Aluno</a>
          <a class="dropdown-item" href="consulta_turma.php">Turma</a>
          <a class="dropdown-item" href="consulta_aluno_turma.php">Aluno-Turma</a>
          <a class="dropdown-item" href="consulta_curso.php">Curso</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Relatorios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="relatorio_aluno.php">Aluno</a>
          <a class="dropdown-item" href="relatorio_turma.php">Turma</a>
          <a class="dropdown-item" href="relatorio_aluno_turma.php">Aluno-Turma</a>
          <a class="dropdown-item" href="relatorio_curso.php">Curso</a>
        </div>
      </li>
      </ul>
     <div class="my-2 my-lg-0">
      <button class="btn btn-danger my-2 my-sm-0" type="button" onclick="window.location.href='sair.php'">Sair</button>
    </div>

  </div>
</nav>
