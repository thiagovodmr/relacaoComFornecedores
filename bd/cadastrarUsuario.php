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

	$nome = $_POST["nome_da_empresa"];
	$cidade = $_POST["cidade_da_empresa"];
	$telefone = $_POST["telefone_da_empresa"];
	$cnpj = $_POST["cnpj_da_empresa"];
	$logradouro = $_POST["logradouro_da_empresa"];
	$email = $_POST["email_da_empresa"];
	$login = $_POST["login_da_empresa"];
	$senha = $_POST["senha_da_empresa"];
	$perfil = md5($nome);

	$sql = "INSERT INTO usuarios(USER_NOME,USER_CIDADE,USER_TELEFONE,USER_CNPJ,USER_LOGRADOURO,USER_EMAIL,USER_LOGIN,USER_SENHA,USER_PERFIL) 
		VALUES(:nome, :cidade, :telefone, :cnpj, :logradouro, :email, :login, :senha, :perfil)";
	$stmt = $conn->prepare( $sql );
	$stmt->bindParam( ':nome', $nome );
	$stmt->bindParam( ':cidade', $cidade );
	$stmt->bindParam( ':telefone',$telefone );
	$stmt->bindParam( ':cnpj', $cnpj);
	$stmt->bindParam( ':logradouro', $logradouro);
	$stmt->bindParam( ':email', $email);
	$stmt->bindParam( ':login', $login);
	$stmt->bindParam( ':senha', $senha);
	$stmt->bindParam( ':perfil', $perfil);

	$result = $stmt->execute();

	if ( ! $result ){
	    var_dump( $stmt->errorInfo() );
	    exit;
	}	  
	// echo $stmt->rowCount() . "linhas inseridas";
	header("location: ../login.php");
?>