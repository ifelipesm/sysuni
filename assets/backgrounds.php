<?php
if (strpos($_SERVER['REQUEST_URI'], "alt") !== false){
echo "<body class='bg'>";
}
if (strpos($_SERVER['REQUEST_URI'], "turma") !== false){
echo "<body class=''>";
}
if (strpos($_SERVER['REQUEST_URI'], "curso") !== false){
echo "<body class=''>";
}
if (strpos($_SERVER['REQUEST_URI'], "aluno_turma") !== false){
echo "<body class=''>";
}
if (strpos($_SERVER['REQUEST_URI'], "principal") !== false){
echo "<body class='bg'>";
}

?>