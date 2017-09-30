<?php 
	include "cabecalho.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>
<body>
<div id="borda">
<div id="Quadro">
<h1>Categorias</h1>
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
	</br>
<div id="formu">
<form action="pesquisa.php" method="POST">
	<input type="text" name="pesquisa" placeholder="Pesquisar Produtos">
	<input type="image" class="fa fa-search fa-3x" aria-hidden="true" value=" ">
</form>
</div>

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="imagens/img2.jpg" alt="Chania">
      </div>

      <div class="item" id="p2">
        <img src="imagens/img1.jpg" alt="Chania">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<br>

<?php
include 'rodape.php';
?>
</body>
</html>