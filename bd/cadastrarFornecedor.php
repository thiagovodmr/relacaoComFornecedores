<?php 

$dbname = "relacaocomfornecedores";
$usuario="root";
$senha = "";

if(!($id= mysqli_connect("localhost",$usuario,$senha))){
	echo "Não foi possivel estabelecer uma conexão com o gerenciador Mysql";
	exit();
}

if(!($con=mysqli_select_db($id,$dbname))){
	echo "não foi possivel se conectar com o mysql";
	exit();
}

$nome = $_POST["nome_da_fornecedor"];
$cidade = $_POST["cidade_da_fornecedor"];
$telefone = $_POST["telefone_da_fornecedor"];
$cep = $_POST["cep_da_fornecedor"];
$endereco = $_POST["endereco_da_fornecedor"];
$login = $_POST["login_da_fornecedor"];
$senha = $_POST["senha_da_fornecedor"];
$email = $_POST["email_da_fornecedor"];

$sql="INSERT INTO fornecedor(FND_NOME,FND_CIDADE,FND_TELEFONE,FND_CEP,FND_ENDERECO,FND_LOGIN,FND_SENHA,FND_EMAIL) VALUES ('$nome','$cidade','$telefone','$cep','$endereco','$login','$senha','$email')";


// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($id,$sql))
{
    die('Error: ' . mysqli_error($id));
}

// MOSTRA A MENSAGEM DE SUCESSO
echo "1 record added";

mysqli_close($id);

 ?>