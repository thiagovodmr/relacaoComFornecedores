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


	$dat = date("Y-m-d H:i:s");
	$data = date('Y-m-d H:i:s', strtotime($dat.' - 3 hours'));
	$remetente = $_SESSION["perfil"];
	$mensagem = htmlspecialchars($_POST["conteudo"]);
	$destinatario = $_SESSION['dest'];

	$sql = "INSERT INTO mensagens(MEN_REMETENTE, MEN_DESTINATARIO, MEN_CONTEUDO, MEN_HORARIO) 
		VALUES(:remetente, :destinatario, :mensagem, :horario)";	
	$stmt = $conn->prepare( $sql );
	$stmt->bindParam( ':remetente', $remetente );
	$stmt->bindParam( ':destinatario',$destinatario  );
	$stmt->bindParam( ':mensagem',$mensagem  );
	$stmt->bindParam( ':horario',$data  );

	$result = $stmt->execute();

	if ( ! $result ){
	    var_dump( $stmt->errorInfo() );
	    exit;
	}
	header("location: ../mensagens.php?id=$destinatario");
?>



 ?>