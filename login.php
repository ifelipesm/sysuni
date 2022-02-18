<?php session_start();
include_once('conexao.php');
?>

<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--Font awesome -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!--Open Sans -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">

<?php
$log = $_POST['login'];
$sen = sha1($_POST['senha']);
$sql = $pdo->query("select id, nome from sistema where login='$log' and senha='$sen' and status = '1'");
if($row = $sql->fetch(PDO::FETCH_ASSOC)){
	$_SESSION['user_nome'] = $row['nome'];
	$_SESSION['user_cod'] = $row['id'];
	?>
	<div class="container-login">
	<div id="alert-update"  class="alert alert-success" role="alert">
    <h2>Login bem sucedido! Bem vindo, <?=$_SESSION['user_nome']?>.</h2>
    </div>
    </div>
	<?php
	echo "<meta http-equiv='refresh' content='3;principal.php'/>";
	exit;
}
else{
	session_destroy();
	?>
	<div class="container-login">
	<div id="alert-update"  class="alert alert-danger" role="alert">
    <h2>Dados do Login e/ou Senha incorretos.</h2>
    </div>
</div>
    <?php
	echo "<meta http-equiv='refresh' content='3;index.php'/>";
}
?>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/JavaScript" src="assets/js/bootstrap.min.js"></script>