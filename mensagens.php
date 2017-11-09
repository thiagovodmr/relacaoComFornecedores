<?php
include 'cabecalho.php';
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
	</style>
</head>
</head>
<body>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-sm-2">	
			<ul class="list-group">
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			  <li class="list-group-item justify-content-between">teste</li>
			</ul>
		</div>
		<div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1">	
			<form action="bd/salvar_mensagem.php" method="POST">
				
				<fieldset>
					
					<div class="row">
						<div class="form-group col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
						 	<label for="exampleInputEmail1">Nome da Empresa</label>
							<input name="destinatario" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da Empresa">
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-10 col-md-offset-1  col-sm-10 col-sm-offset-1">
							<label for="exampleFormControlTextarea1">Digite sua mensagem</label>
							<textarea name="conteudo" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
						</div>
						<div class="form-group col-md-5 col-md-offset-5">
							<input type="submit" value="enviar">
							
						</div>
					</div>
				
				</fieldset>

			</form>
		</div>
	</div>
	</div>
</body>
</html>