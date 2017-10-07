<?php 
$dbname = "relacaocomfornecedores";
$usuario="root";
$senha = "";

try {
  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

// header("inserirbd.php");
$titulo = $_POST["titulo"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$imagem = $_POST["imagem"];


$sql = "INSERT INTO usuario(USER_NOME,USER_CIDADE,USER_TELEFONE,USER_CNPJ,USER_LOGRADOURO,USER_EMAIL,USER_LOGIN,USER_SENHA) 
	VALUES(:nome, :cidade, :telefone, :cnpj, :logradouro, :email, :login, :senha)";

$stmt = $conn->prepare( $sql );
$stmt->bindParam( ':nome', $nome );
$stmt->bindParam( ':cidade', $cidade );
$stmt->bindParam( ':telefone',$telefone );
$stmt->bindParam( ':cnpj',$cnpj);
$stmt->bindParam( ':logradouro', $logradouro);
$stmt->bindParam( ':email',$email);
$stmt->bindParam( ':login',$login);
$stmt->bindParam( ':senha',$senha);

$result = $stmt->execute();

if ( ! $result ){
    var_dump( $stmt->errorInfo() );
    exit;
}
  
echo $stmt->rowCount() . "linhas inseridas";



?>