<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function header(){
			window.location='../usuario.php';
		}
	</script>
</head>
<body>
	<?php
	session_start();
	$dbname = "id2846308_projeto1";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

	$login = $_SESSION['login'];
	$nome_categoria = $_POST["nome_categoria"];
	$descricao = $_POST["descricao"];

	$sql = "INSERT INTO categorias(CAT_NOME,CAT_DESCRICAO) 
		VALUES(:nome_categoria, :descricao)";	
	$stmt = $conn->prepare( $sql );
	$stmt->bindParam( ':nome_categoria', $nome_categoria );
	$stmt->bindParam( ':descricao', $descricao );

	
	$result = $stmt->execute();

	if ( ! $result ){
	    var_dump( $stmt->errorInfo() );
	    exit;
	}
	echo "<script>header()</script>";
?>
</body>
</html>