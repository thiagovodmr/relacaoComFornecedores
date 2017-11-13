<?php

	$dbname = "id2846308_projeto1";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'Falha na conexão: ' . $e->getMessage();
	}


	$id = $_GET['id'];
	$sql = "DELETE FROM produtos WHERE PRO_ID = :id";
	
	$stmt = $conn->prepare($sql);
	
	$stmt->bindParam(":id",$id);

	$result = $stmt->execute();

		if ( ! $result ){
		    var_dump( $stmt->errorInfo() );
		    exit;
		}
	
	header('location: ../meus_Produtos.php');

?>