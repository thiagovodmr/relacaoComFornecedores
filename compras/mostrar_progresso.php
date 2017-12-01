<!DOCTYPE html>
<html>
<head>
	<title>Progresso</title>
	<style>
		.progress{
			border: 0.6px solid black
		}
	</style>
</head>
<body>
	<?php 
		include("../cabecalho.php");
	 	$id = $_GET['id'];
		$larguras = [0,5,54,100];
	 ?>

	 <div class="container">
		<div class="row">
			<div class="col-md-1 col-sm-1">
				<i class="fa fa-money fa-3x" aria-hidden="true"></i>
	 		</div>
	 		<div class="col-md-1 col-md-offset-5 col-sm-1 col-sm-offset-5">
	 			<i class="fa fa-truck fa-3x" aria-hidden="true"></i>
	 		</div>
	 		<div class="col-md-1 col-md-offset-4 col-sm-1 col-sm-offset-4">
				<i class="fa fa-check fa-3x" style="color:green" aria-hidden="true"></i>
			</div>
		 </div>
		 <div class="row">
		 	<div class="col-md-12 col-sm-12">
				<div class="progress">

					
	      		  <div class="progress-bar progress-bar-success" style="width: <?= $larguras[$status] ?>%">
				    <span class="sr-only">35% Complete (success)</span>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>