<?php
session_start();
	$dbname = "id2846308_projeto1";
	$usuario = "id2846308_pep1";
  	$senha = "@lunoifpe";
  
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Autenticação</title>
	<script type="text/javascript">
		function loginsucess(){
			window.location='usuario.php';
		}
		function loginfailed(){
			window.location='login.php';
		}
	</script>
</head>
<body>

<?php  
$login = $_POST['login'];
$senha = $_POST['senha'];

$sql ="SELECT * FROM usuarios WHERE USER_LOGIN = :login and USER_SENHA = :senha";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":login",$login);
$stmt->bindParam(":senha",$senha);

$result = $stmt->execute();

$row = $stmt->rowCount();
if($row > 0){
	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	$_SESSION['logado'] = True;
	echo "<script>loginsucess()</script>";

}
else{
	echo "<script>loginfailed()</script>";
}
?>

</body>
</html>