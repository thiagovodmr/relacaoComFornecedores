<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/cadastro_produtos.css">
	<title>
		Cadastrar Categoria
	</title>
</head>
<body>
<div class="card card-container">
	<h1>Cadastre uma nova categoria</h1>
    	<p id="profile-name" class="profile-name-card"></p>
	<form action="bd/cadastrar_Categoria.php" method="POST">
		Nome : <input id="inputEmail" class="form-control" type="text" name="nome_categoria" maxlength="50" required><br>
		Descrição : <input id="inputEmail" class="form-control" type="text" name="descricao" maxlength="200" required><br>
		<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button>

	</form>

</div><!-- /card-container -->
</div>
<div id="espaco">
	
</div>

</body>
</html>