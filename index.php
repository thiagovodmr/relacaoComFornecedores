<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>SSexpress</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div id='imagem'>
		<div id="cadastro">
			<h2>Ainda não é cadastrado? Cadastre-se :</h2>
			<p>Quem você é?</p>
			<a href="cadastroempresa.php"><button>Empresa</button></a> ou
			<a href="cadastrofornecedor.php"><button>Fornecedor</button></a>
		</div>
	</div>
	
	<div id="login">
		<h1>Login</h1>
		<form>
			<fieldset>
				<label for= "nome">Nome</label>
				<input type="text" name="nome"><br>
				<label for="senha">Senha</label>
				<input type="password" name="senha"><br>
				<input type="submit" value="Entrar">
			</fieldset>
		</form>
	</div>
</body>
</html>