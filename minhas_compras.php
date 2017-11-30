<!DOCTYPE html>
<html>
<head>
	<title>Minhas Compras</title>
</head>
<body>
	<?php
	session_start();
	$dbname = "id2846308_projeto1";
	$usuario = "id2846308_pep1";
	$senha = "@lunoifpe";

	try{
		$conn = new PDO("mysql:host=localhost;dbname=$dbname",$usuario,$senha);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Falha na conexão: ";$e.getMessage();
	}
	$id = $_SESSION['id'];
	
	echo "<h1>Produtos Comprados</h1>";
	$sql = "SELECT p.PRO_TITULO, p.PRO_PRECO, p.PRO_USER_ID, c.COM_VENDEDOR, c.COM_COMPRADOR, c.COM_ID FROM produtos as p inner join compra as c on c.COM_COMPRADOR = p.PRO_USER_ID WHERE COM_COMPRADOR = '$id'";

	foreach ($conn->query($sql) as $row){
		$titulo = $row['PRO_TITULO'];
		$compraid = $row['COM_ID'];
		echo "<a href='/compras/mostrar_progresso.php?id=$compraid'><h2>$titulo</h2></a>";
	}

	echo "<h1> Produtos Vendidos</h1>";
	$sql1 = "SELECT p.PRO_TITULO, p.PRO_PRECO, p.PRO_USER_ID, c.COM_VENDEDOR, c.COM_COMPRADOR, c.COM_ID FROM produtos as p inner join compra as c on c.COM_VENDEDOR = p.PRO_USER_ID WHERE COM_VENDEDOR = '$id'";

	foreach ($conn->query($sql1) as $row1){
		$titulo1 = $row1['PRO_TITULO'];
		$compraid1 = $row1['COM_ID'];
		echo "<a href='/compras/mostrar_progresso.php?id=$compraid1'><h2>$titulo1</h2></a>";
	}

	?>


</body>
</html>