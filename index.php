<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script src="recursos/jquery/jquery-3.2.1.min.js"></script>
  <script src="recursos/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
  
<script src="javascript/index.js"></script>
<div class="container" id="cont">
  
  <h2>Está começando seu próprio negócio agora?</h2>
  <h3>Aqui é o lugar certo!</h3>
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="imagens/g1.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Ainda não é Cadastrado?</h3>
          <p><a href="cadastro_usuario.php" class="btn btn-primary" role="button">Cadastre-se</a></p>
        </div>
      </div>

      <div class="item">
        <img src="imagens/g2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Simplicidade</h3>
          <p>Aqui você poderá encontrar uma grande oportunidade. Faça seu empresa evoluir com apenas alguns clicks</p>
        </div>
      </div>
    
      <div class="item">
        <img src="imagens/g3.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>Facilidade</h3>
          <p>Está sem mercadoria? Ache um fornecedor mais próximo de você!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Voltar</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>
</div>
<br>
<div class="jumbotron">
  <h1>SSexpress</h1>      
  <p>A Stationery Store Express é um portal que possibilidade a interatividade de uma empresa com seu fornecedor</p>
</div>

<div class="container">
  <p>Aqui você poderá encontrar uma empresa para contratar seus serviços</p>      
</div>
<br>
<?php
include 'rodape.php';
?>
</body>
</html>