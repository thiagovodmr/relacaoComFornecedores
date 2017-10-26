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

	$nnome = $_SESSION['empresa'];
	$perfill = $_SESSION['perfil'];
	$login = $_SESSION['login'];
	$titulo = $_POST["titulo"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$image = $_POST["destino"];
	$categoria = $_POST["categoria"];

	$sql = "INSERT INTO produtos(PRO_TITULO,PRO_PRECO,PRO_DESCRICAO,PRO_CATEGORIA,PRO_ARQUIVO,PRO_LOGIN,PRO_NOME,PRO_PERFIL) 
				VALUES(:titulo, :preco, :descricao, :categoria, :imagem, :login, :nome, :perfil)";	
			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':titulo', $titulo );
			$stmt->bindParam( ':preco', $preco );
			$stmt->bindParam( ':descricao',$descricao );
			$stmt->bindParam( ':categoria', $categoria );
			$stmt->bindParam( ':imagem', $image );
			$stmt->bindParam( ':login', $login );
			$stmt->bindParam( ':nome', $nnome );
			$stmt->bindParam( ':perfil', $perfill );

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