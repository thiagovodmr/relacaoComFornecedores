<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <h1>SSexpress</h1>      
  <p>O site que busca ajudar sua empresa a encontrar um fornecedor mais próximo de você!</p>
</div>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="imagens/p1.jpg" alt="Chania">
        <div class="carousel-caption" id="p1">
          <h1><b>Praticidade</b></h1>
          <p>Descubra o fornecedor mais próximo de você com apenas um click!</p>
        </div>
      </div>

      <div class="item" id="p2">
        <img src="imagens/p2.png" alt="Chania">
        <div class="carousel-caption">
          <h1><b>Comunicação</h1></b></h1>
          <p>Mais facilidade para se comunicar com seu fornecedor</p>
        </div>
      </div>
    
      <div class="item">
        <img src="imagens/gps.jpg" alt="Flower">
        <div class="carousel-caption" id="p3">
          <h1><b>Agilidade</b></h1>
          <p>Não perca tempo, saiba onde sua mercadoria está!</p>
        </div>
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