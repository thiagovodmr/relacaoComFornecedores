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
</h1>
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

<br>
<div id="formu">
<form action="pesquisa.php" method="POST">
	<input type="text" name="pesquisa" placeholder="Pesquisar Produtos">
	<input type="image" class="fa fa-search fa-3x" aria-hidden="true" value=" ">
</form>
</div>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imagens/p1.jpg" alt="">
      <div class="caption">
        <h3>Produto</h3>
        <p>Descrição...</p>
        <p><a href="#" class="btn btn-primary" role="button">Link para o Fornecedor</a> <a href="#" class="btn btn-default" role="button">Link para o Produto</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imagens/p3.jpg" alt="">
      <div class="caption">
        <h3>Produto</h3>
        <p>Descrição...</p>
        <p><a href="#" class="btn btn-primary" role="button">Link para o Fornecedor</a> <a href="#" class="btn btn-default" role="button">Link para o Produto</a></p>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imagens/p1.jpg" alt="">
      <div class="caption">
        <h3>Produto</h3>
        <p>Descrição...</p>
        <p><a href="#" class="btn btn-primary" role="button">Link para o Fornecedor</a> <a href="#" class="btn btn-default" role="button">Link para o Produto</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imagens/p3.jpg" alt="">
      <div class="caption">
        <h3>Produto</h3>
        <p>Descrição...</p>
        <p><a href="#" class="btn btn-primary" role="button">Link para o Fornecedor</a> <a href="#" class="btn btn-default" role="button">Link para o Produto</a></p>
      </div>
    </div>
  </div>
</div>

<div id="">
  
</div>

<?php
include 'rodape.php';
?>
</body>
</html>