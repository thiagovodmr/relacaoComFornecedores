<?php
	include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<script> 
			window.setTimeout("location.href='usuario.php'",1000*10);
		</script>
		<?php
		$prat = $_POST['pesquisa'];
		echo "<h1>Pesquisando por ".$prat."... </h1>";
		include 'rodape.php';
		?>
	</body>
</html>