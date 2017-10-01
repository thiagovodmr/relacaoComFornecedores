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

$nome = $_POST["nome_da_empresa"];
$cidade = $_POST["cidade_da_empresa"];
$telefone = $_POST["telefone_da_empresa"];
$cnpj = $_POST["cnpj_da_empresa"];
$endereco = $_POST["endereco_da_empresa"];
$login = $_POST["login_da_empresa"];
$senha = $_POST["senha_da_empresa"];
$email = $_POST["email_da_empresa"];

$sql="INSERT INTO empresa(EMP_NOME,EMP_CIDADE,EMP_TELEFONE,EMP_CNPJ,EMP_ENDERECO,EMP_LOGIN,EMP_SENHA,EMP_EMAIL) VALUES ('$nome','$cidade','$telefone','$cnpj','$endereco','$login','$senha','$email')";


// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($id,$sql))
{
    die('Error: ' . mysqli_error($id));
}

// MOSTRA A MENSAGEM DE SUCESSO
echo "1 record added";

mysqli_close($id);

 ?>