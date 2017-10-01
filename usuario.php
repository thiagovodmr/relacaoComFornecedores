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

<div class="list-group" id="formulario">
	<h1>Categorias</h1>
  <a href="#" class="list-group-item">ADESIVOS</a>
  <a href="#" class="list-group-item">APONTADOR</a>
  <a href="#" class="list-group-item">BLOCOS AUTOADESIVOS E MARCADORES DE PÁGINAS </a>
  <a href="#" class="list-group-item">CADERNOS, BLOCOS E AGENDAS</a>
  <a href="#" class="list-group-item">CLIPS, ALFINETES E ELÁSTICOS</a>
  <a href="#" class="list-group-item">COLAS</a>
  <a href="#" class="list-group-item">CRACHÁS</a>
  <a href="#" class="list-group-item">EMBALAGENS</a>
  <a href="#" class="list-group-item">ENCADERNAÇÃO</a>
  <a href="#" class="list-group-item">ENVELOPES</a>
  <a href="#" class="list-group-item">ESCRITA E CORRETIVO</a>
  <a href="#" class="list-group-item">ETIQUETAS</a>
  <a href="#" class="list-group-item">FICHÁRIOS E ACESSÓRIOS</a>
  <a href="#" class="list-group-item">FITAS ADESIVAS</a>
  <a href="#" class="list-group-item">FORMULÁRIOS E IMPRESSOS</a>
  <a href="#" class="list-group-item">GRAMPEADORES E GRAMPOS</a>
  <a href="#" class="list-group-item">MATERIAL ESCOLAR</a>
  <a href="#" class="list-group-item">MATERIAL DE ESCRITÓRIO</a>
  <a href="#" class="list-group-item">MOCHILAS ESCOLARES, ESTOJOS E LANCHEIRAS</a>
  <a href="#" class="list-group-item">PASTAS</a>
  <a href="#" class="list-group-item">RÉGUAS E COMPASSO</a>
  <a href="#" class="list-group-item">SACOS PLÁSTICOS</a>
  <a href="#" class="list-group-item">TESOURAS E ESTILETES</a>
  <a href="#" class="list-group-item">LIVROS PARA COLORIR</a>
  <a href="#" class="list-group-item">TINTAS</a>
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
        <img src="imagens/p3.jpg" alt="Chania">
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
<script src="javascript/usuario.js"></script>
<?php
include 'rodape.php';
?>
</body>
</html>