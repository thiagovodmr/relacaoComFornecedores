<?php
	session_start();
	ob_start();
	$dbname = "id2846308_projeto1";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
	//Redes sociais
	$google_plus  = $_POST["google_plus"];
	$facebook	  = $_POST["facebook"];
	$twitter	  = $_POST["twitter"];
	$linkedln	  = $_POST["linkedln"];
	$github       = $_POST["github"];
	
	//Dados da empresa
	$nome 		  	 = $_POST["nome_do_usuario"];
	$nome_empresa 	 = $_POST["nome_da_empresa"];
	$descricao 	  	 = $_POST["descricao"];
	$cep 		  	 = $_POST["cep"];
	$logradouro   	 = $_POST["logradouro_da_empresa"];
	$bairro		  	 = $_POST["bairro"];
	$cidade 	  	 = $_POST["cidade_da_empresa"];
	$estado 	  	 = $_POST["estado"];
	$latitude 	  	 = $_POST["lat"];
	$longitude 	  	 = $_POST["lng"];
	$complet_address = $_POST["complet_address"];
	$cnpj 		   	 = $_POST["cnpj_da_empresa"];
	$email 		  	 = $_POST["email_da_empresa"];
	$telefone     	 = $_POST["telefone_da_empresa"];
	$login 		  	 = $_POST["login_da_empresa"];
	$senha    	  	 = md5($_POST["senha_da_empresa"]);
	$perfil       	 = md5($nome);

	$sql = "INSERT INTO usuarios(USER_NOME,USER_EMPRESA,USER_CEP,USER_BAIRRO,USER_ESTADO,USER_CIDADE,USER_COMPLETO,USER_TELEFONE,USER_CNPJ,USER_LOGRADOURO,USER_LATITUDE,USER_LONGITUDE,USER_EMAIL,USER_LOGIN,USER_SENHA,USER_PERFIL,USER_DESCRICAO,USER_GOOGLE_PLUS,USER_FACEBOOK,USER_TWITTER,USER_LINKEDLN,USER_GITHUB)
			VALUES(:nome, :nome_empresa, :cep, :bairro, :estado ,:cidade, :endereco_completo, :telefone, :cnpj, :logradouro,:latitude,:longitude,:email, :login, :senha, :perfil, :descricao, :google_plus, :facebook, :twitter, :linkedln, :github)";
	
	var_dump($_POST);
	$stmt = $conn->prepare( $sql );
	$stmt->bindParam( ':nome', $nome );
	$stmt->bindParam( ':nome_empresa', $nome_empresa);
	$stmt->bindParam( ':cep', $cep);
	$stmt->bindParam( ':bairro', $bairro);
	$stmt->bindParam( ':estado', $estado);
	$stmt->bindParam( ':cidade', $cidade );
	$stmt->bindParam( ':endereco_completo', $complet_address);
	$stmt->bindParam( ':telefone',$telefone );
	$stmt->bindParam( ':cnpj', $cnpj);
	$stmt->bindParam( ':logradouro', $logradouro);
	$stmt->bindParam( ':latitude', $latitude);
	$stmt->bindParam( ':longitude', $longitude);
	$stmt->bindParam( ':email', $email);
	$stmt->bindParam( ':login', $login);
	$stmt->bindParam( ':senha', $senha);
	$stmt->bindParam( ':perfil', $perfil);
	$stmt->bindParam( ':descricao', $descricao);
	$stmt->bindParam( ':google_plus', $google_plus);
	$stmt->bindParam( ':facebook', $facebook);
	$stmt->bindParam( ':twitter', $twitter);
	$stmt->bindParam( ':linkedln', $linkedln);
	$stmt->bindParam( ':github', $github);
	$result = $stmt->execute();
	if ( ! $result ){
	    var_dump( $stmt->errorInfo() );
	    exit;
	}	  
	// echo $stmt->rowCount() . "linhas inseridas";
	header("location: ../login.php");
?>