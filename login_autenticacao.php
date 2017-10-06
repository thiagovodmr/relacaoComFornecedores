<?php
session_start();
$host = "localhost";
$banco = "id2846308_projeto1";
$user = "id2846308_pep1";
$pass = "@lunoifpe";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
mysqli_select_db($conexao, $banco) or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Autenticação</title>
	<script type="text/javascript">
		function loginsucess(){
			setTimeout("window.location='usuario.php'",1000*3);
		}
		function loginfailed(){
			setTimeout("window.location='login.php'",1000*3);
		}
	</script>
</head>
<body>

<?php  
$login = $_POST['login'];
$senha = $_POST['senha'];
$sql = mysqli_query($conexao,"SELECT * FROM usuarios WHERE USER_LOGIN = '$login' and USER_SENHA = '$senha'") or die(mysql_error('Login ou senha errado'));
$row = mysqli_num_rows($sql);
if($row > 0){
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	$_SESSION['logado'] = True;
	echo "Você foi autenticado com sucesso! Aguarde um instante!";
	echo "<script>loginsucess()</script>";

}
else{
	echo "Nome do usuário ou senha inválido, tente novamente em instantes!";
	echo "<script>loginfailed()</script>";
}
?>

</body>
</html>