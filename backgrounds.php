<?php
if (stripos($_SERVER['REQUEST_URI'], "aluno") !== false){
echo "<body class='bg2'>";
}
else if (stripos($_SERVER['REQUEST_URI'], "turma") !== false){
echo "<body class='bg3'>";
}
else if (stripos($_SERVER['REQUEST_URI'], "curso") !== false){
echo "<body class='bg4'>";
}
else if (stripos($_SERVER['REQUEST_URI'], "aluno_turma") !== false){
echo "<body class='bg5'>";
}
else if (stripos($_SERVER['REQUEST_URI'], "principal") !== false){
echo "<body class='bg'>";
}
/* Pagina de testes
else if (stripos($_SERVER['REQUEST_URI'], "queries") !== false){
echo "<body class='bg2'>";
}
*/
?>