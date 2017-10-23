<?php
	include 'cabecalho.php';
	$llogin = $_SESSION['login'];
	$host = "localhost";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	$bd = "id2846308_projeto1";
	$strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
	$sql = "SELECT * FROM categorias ORDER BY CAT_NOME";
    $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
    $name = mysqli_query($strcon, "SELECT CAT_NOME,CAT_ID FROM categorias") or die(mysqli_error($strcon));
    $re = mysqli_fetch_array($name);
	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/cadastro_produtos1.css">
	<title>
		Cadastrar Produtos
	</title>
</head>
<body>
<div class="card card-container">
	<h1>Cadastre seus Produtos</h1>
    	<p id="profile-name" class="profile-name-card"></p>
	<form name="frm-jcrop" id="frm-jcrop" action="bd/cadastrar_Produtos.php" method="POST" enctype="multipart/form-data">
		Selecione a categoria:<select name="categoria" class="selectpicker">
			<?php
			while($registro = mysqli_fetch_array($resultado)){
   				$nome = $registro['CAT_NOME'];
   	   			$id = $registro['CAT_ID'];
				echo "<option value='".$id."'>".strtoupper($nome)."</option>";
    		}	
			?>
		</select>
		<br>

		Titulo : <input id="inputEmail" class="form-control" type="text" name="titulo" maxlength="50" required><br>
		Preço : <input id="inputEmail" class="form-control" type="number" name="preco" maxlength="11" required><br>
		Descrição : <input id="inputEmail" class="form-control" type="text" name="descricao" maxlength="250" required><br>
		Imagem : <input type="file" name="imagem"><br>
		<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button>

	</form>

</div><!-- /card-container -->
</div>
<div id="espaco">
	
</div>

</body>
</html>