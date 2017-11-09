<?php
include 'cabecalho.php';
include 'bd/conexao.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="recursos/jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">
	<script src="recursos/bootstrap/js/bootstrap.min.js"></script>
	<style>
		#menssage{
			font-size: 20px;
			overflow: auto;
			margin-left: 10px;
			height: 200px;
		}
		.list-group-item{
			border: 1px solid black;
		}
		form{
			border: 3px solid black;
			height: 500px;
			font-size: 2em;
		}
		.container-fluid{
			/*margin-top: 50px;*/
		}
		fieldset{
			margin-top: 50px;
		}
		textarea.form-control{
			height: 200px;
		}
		input[type=submit]{
			background-color: #90EE90;
			border-radius: 10px;
			width: 100%;
		}
		input[type=text]{
			width: 100%;
		}

	</style>
</head>
</head>
<body>
<?php
	$perfilId = $_SESSION['perfil'];

	if(!isset($_GET['id'])){
		$_GET['id'] = [];	
	}
	if(!isset($_SESSION['dest'])){
		$_SESSION['dest'] = [];	
	}
	$id = $_GET['id'];
	$_SESSION['dest'] = $_GET['id'];
?>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-sm-2">	
			<ul class="list-group">
	<?php
		$sql = "SELECT * FROM usuarios";
		$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
		while($registro = mysqli_fetch_array($resultado)){
  			$nome_interprise = $registro['USER_EMPRESA'];
  			$identificador = $registro['USER_PERFIL'];
			echo "<li class='list-group-item justify-content-between'><a href=mensagens.php?id=".$identificador.">".$nome_interprise."</a></li>";
  		}
	?>
			</ul>
		</div>

		<div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1">	
			<form action="bd/salvar_mensagem.php" method="POST">
				
				<fieldset>
					<div class="row">
						<div class="form-group col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
						 	<?php
						 		if(isset($_GET['id'])){
									$sql1 = "SELECT * FROM usuarios WHERE USER_PERFIL = '$id'";
									$resultado1 = mysqli_query($strcon, $sql1) or die('Erro ao tentar cadastrar registro');
									while($registro1 = mysqli_fetch_array($resultado1)){
  										$nome_empresa = $registro1['USER_EMPRESA'];
						 				echo "<label for='exampleInputEmail1'>$nome_empresa</label>";
						 			}
						 		}
						 		else{
						 			echo "errouuu";
						 		}
						 	?>
						</div>
					</div>
					<div id="menssage">
						<?php
						if (isset($_GET['id']) || isset($id)) {
							$sql2 = "SELECT * FROM mensagens WHERE MEN_REMETENTE = '$id' and MEN_DESTINATARIO = '$perfilId'";
							$resultado2 = mysqli_query($strcon, $sql2) or die('Erro ao tentar cadastrar registro');
							while($registro2 = mysqli_fetch_array($resultado2)){
			  					$mensagemParaMim = $registro2['MEN_CONTEUDO'];
			  					echo $mensagemParaMim."<p>";
			  				}
						}
						?>
					</div>
					<?php
					if($_GET['id'] == []){
						echo "<h1>Negocie com alguem!</h1>";
					}
					else{
					?>

					<div class="row">
						<div class="form-group col-md-10 col-md-offset-1  col-sm-10 col-sm-offset-1">
							<label for="exampleFormControlTextarea1"></label>
							<input type="text" name="conteudo" placeholder="Digite sua mensagem">
						</div>
						<div class="form-group col-md-5 col-md-offset-5">
							<input type="submit" value="Enviar">
							
						</div>
					</div>
					<?php } ?>
				</fieldset>

			</form>
		</div>
	</div>
	</div>
</body>
</html>