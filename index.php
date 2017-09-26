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
			<div id="embaixo">
				<p>Quem você é?</p>
				<a href="cadastroempresa.php"><button>Empresa</button></a> ou
				<a href="cadastrofornecedor.php"><button>Fornecedor</button></a>
			</div>	
		
		</div>
	</div>
	
	<div id="login">
		<form>
			<fieldset>
				<h1 id="h1">SSexpress</h1>
				<label for= "nome">Login:</label>
				<input type="text" name="nome"><br>
				<label for="senha">Senha:</label>
				<input type="password" name="senha"><br>
				<input type="submit" value="Entrar">
			</fieldset>
		</form>
	</div>
</body>
</html>