<?php
	session_start();
// if( $_SERVER['REQUEST_METHOD'] == 'POST' )
// {

	$dbname = "id2846308_projeto1";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

	$id = $_SESSION["id"];
	$titulo = htmlspecialchars($_POST["titulo"]);
	$preco = htmlspecialchars($_POST["preco"]);
	$descricao = htmlspecialchars($_POST["descricao"]);
	$image = htmlspecialchars($_POST["destino"]);
	$categoria = htmlspecialchars($_POST["categoria"]);

	$sql = "INSERT INTO produtos(PRO_TITULO,PRO_PRECO,PRO_DESCRICAO,PRO_CATEGORIA,PRO_ARQUIVO,PRO_USER_ID) 
				VALUES(:titulo, :preco, :descricao, :categoria, :imagem, :userId)";	
			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':titulo', $titulo );
			$stmt->bindParam( ':preco', $preco );
			$stmt->bindParam( ':descricao',$descricao );
			$stmt->bindParam( ':categoria', $categoria );
			$stmt->bindParam( ':imagem', $image );
			$stmt->bindParam( ':userId', $id );

			$result = $stmt->execute();

			if ( ! $result ){
			    var_dump( $stmt->errorInfo() );
			    exit;
			}

	include( 'm2brimagem.class.php' );
	$oImg = new m2brimagem( $_POST['img'] );
	if( $oImg->valida() == 'OK' )
	{
		$oImg->posicaoCrop( $_POST['x'], $_POST['y'] );
		$oImg->redimensiona( $_POST['w'], $_POST['h'], 'crop' );
		$oImg->grava( $_POST['img'] );

		copy($_POST["img"] , $_POST["destino"]);
		unlink($_POST["img"]);
	}
// }
exit;