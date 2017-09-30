<?php
	include 'cabecalho.php';
	$prat = $_POST['pesquisa'];
	echo "Pesquisando por ".$prat."...";
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
		include 'rodape.php';
		?>
	</body>
</html>