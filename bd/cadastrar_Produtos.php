<?php  
	$dbname = "id2846308_projeto1";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

	$titulo = $_POST["titulo"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$imagem = $_POST["imagem"];
	$categoria = $_POST["categoria"];

	$sql = "INSERT INTO produtos(PRO_TITULO,PRO_PRECO,PRO_DESCRICAO,PRO_CATEGORIA,PRO_ARQUIVO) 
		VALUES(:titulo, :preco, :descricao, :categoria, :imagem)";

	$stmt = $conn->prepare( $sql );
	$stmt->bindParam( ':titulo', $titulo );
	$stmt->bindParam( ':preco', $preco );
	$stmt->bindParam( ':descricao',$descricao );
	$stmt->bindParam( ':imagem', $imagem );
	$stmt->bindParam( ':categoria', $categoria );	

	$result = $stmt->execute();

	if ( ! $result ){
	    var_dump( $stmt->errorInfo() );
	    exit;
	}
	// echo $stmt->rowCount() . "linhas inseridas";
	header("location: ../usuario.php");
?>