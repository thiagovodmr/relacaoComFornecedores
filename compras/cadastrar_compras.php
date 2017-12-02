<?php
	session_start();
	$dbname = "id2846308_projeto1";
	$usuario = "id2846308_pep1";
	$senha = "@lunoifpe";

	try{
		$conn = new PDO("mysql:host=localhost;dbname=$dbname",$usuario,$senha);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Falha na conexão: ".$e->getMessage();
	}

	$id_produto = $_GET["id"];
	$id_comprador = $_SESSION["id"];
	$preco = $_POST["preco"];
	$quantidade = $_POST["quantidade"];
	$dat = date("Y-m-d H:i:s");
	$data = date('Y-m-d H:i:s', strtotime($dat.' - 3 hours'));

	$status = 0;

	$sql = "SELECT PRO_USER_ID from produtos WHERE PRO_ID = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id",$id_produto);
	$stmt->execute();

	$registro = $stmt->fetch(PDO::FETCH_ASSOC);

	$id_vendedor = $registro["PRO_USER_ID"];

	$insert = "INSERT INTO compra(COM_COMPRADOR, COM_VENDEDOR, COM_PRODUTO, COM_STATUS, COM_PRECO, COM_QUANTIDADE, COM_DATA) VALUES(:id_comprador, :id_vendedor, :id_produto, :status, :preco, :quantidade, :data)";

	$stmt2 = $conn->prepare($insert);
	$stmt2->bindParam(":id_comprador", $id_comprador);
	$stmt2->bindParam(":id_vendedor", $id_vendedor);
	$stmt2->bindParam(":id_produto", $id_produto);
	$stmt2->bindParam(":status", $status);
	$stmt2->bindParam(":preco", $preco);
	$stmt2->bindParam(":quantidade", $quantidade);
	$stmt2->bindParam(":data", $data);
	$result = $stmt2->execute();

	if ( ! $result ){
	    var_dump( $stmt2->errorInfo() );
	    exit;
	}	
 	
	header("location: ../minhas_compras.php");

 ?>