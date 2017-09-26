<?php 
	include "cabecalho.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>
<body>
<div id="borda">
<div id="Quadro">
<h1>Produtos</h1>
<table>
	<tr>
		<td><a href="#linkdomaterial"> ADESIVOS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> APONTADOR </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> BLOCOS AUTOADESIVOS E MARCADORES DE PÁGINAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> CADERNOS, BLOCOS E AGENDAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> CLIPS, ALFINETES E ELÁSTICOS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> COLAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> CRACHÁS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> EMBALAGENS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> ENCADERNAÇÃO </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> ENVELOPES </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> ESCRITA E CORRETIVO </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> ETIQUETAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> FICHÁRIOS E ACESSÓRIOS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> FITAS ADESIVAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> FORMULÁRIOS E IMPRESSOS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> GRAMPEADORES E GRAMPOS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> MATERIAL ESCOLAR </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> MATERIAL DE ESCRITÓRIO </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> MOCHILAS ESCOLARES, ESTOJOS E LANCHEIRAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> PASTAS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> RÉGUAS E COMPASSO </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> SACOS PLÁSTICOS </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> TESOURAS E ESTILETES </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> LIVROS PARA COLORIR </a></td>
	</tr>
	<tr>
		<td><a href="#linkdomaterial"> TINTAS </a></td>
	</tr>
	</table>
	</div>
	</div>

<form action="pesquisa.php" method="POST">
	<input type="text" name="pesquisa" placeholder="Pesquisar Produtos">
	<input type="image" src="imagens/lupa.png" name="imagemLupa" id="lupinha">
</form>

<div id="imagens">
	<img id="muda" src="imagens/img2.jpg" width="800px" height="500px">
</div>

<script src="javascript/usuario.js"></script>

</body>
</html>