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

	$name = sha1(microtime());
	#se existir alguma imagem
	if(isset($_FILES["imagem"])){
		$arquivo = $_FILES["imagem"];
		$pasta_dir = "../uploads/";//diretorio dos arquivos
		$arquivo_nome = $pasta_dir . $name;
		// Faz o upload da imagem
		move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
	}
 	$nome = $_SESSION['nome'];
	$login = $_SESSION['login'];
	$titulo = $_POST["titulo"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$imagem = $arquivo_nome;
	$categoria = $_POST["categoria"];

	$sql = "INSERT INTO produtos(PRO_TITULO,PRO_PRECO,PRO_DESCRICAO,PRO_CATEGORIA,PRO_ARQUIVO,PRO_LOGIN,PRO_NOME) 
		VALUES(:titulo, :preco, :descricao, :categoria, :imagem, :login, :nome)";	
	$stmt = $conn->prepare( $sql );
	$stmt->bindParam( ':titulo', $titulo );
	$stmt->bindParam( ':preco', $preco );
	$stmt->bindParam( ':descricao',$descricao );
	$stmt->bindParam( ':categoria', $categoria );
	$stmt->bindParam( ':imagem', $imagem );
	$stmt->bindParam( ':login', $login );
	$stmt->bindParam( ':nome', $nome );
	$result = $stmt->execute();

	if ( ! $result ){
	    var_dump( $stmt->errorInfo() );
	    exit;
	}
	echo "<script>header()</script>";
?>
</body>
</html>