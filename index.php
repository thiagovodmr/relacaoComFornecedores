<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/index1.css">
</head>
<body>
<div class="parallax"></div>
<div class="container" id="cont">
  
      <h2 class="branco">Está começando seu próprio negócio agora?</h2>
    
  
  
      <h3 class="branco">Aqui é o lugar certo!</h3>

  <div class="row">
    <div class="col-md-12">
  
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
                <div class="row">
                  <h3>Ainda não é Cadastrado?</h3>
                </div>
                <div class="row">
                  <p><a href="cadastro_usuario.php" class="btn btn-primary" role="button">Cadastre-se</a></p>
                </div>
              </div>
            </div>

            <div class="item">
              <img src="imagens/g2.jpg" alt="Chicago" style="width:100%;">
              <div class="carousel-caption">
                <div class="row">
                  <h3>Simplicidade</h3>
                </div>
                <div class="row">
                  <p>Aqui você poderá encontrar uma grande oportunidade. Faça seu empresa evoluir com apenas alguns clicks</p>
                </div>
              </div>
            </div>
          
            <div class="item">
              <img src="imagens/g3.jpg" alt="New York" style="width:100%;">
              <div class="carousel-caption">
                <div class="row">
                  <h3>Facilidade</h3>
                </div>
                <div class="row">
                  <p>Está sem mercadoria? Ache um fornecedor mais próximo de você!</p>
                </div>
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
  </div>

  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
          <h1>SSexpress</h1>
          <p>A Stationery Store Express é um portal que possibilidade a interatividade de uma empresa com seu fornecedor</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10">
      <p style="font-size: 21px;" class="branco">Aqui você poderá encontrar uma empresa para contratar seus serviços</p>      
    </div>
  </div>
</div>
<br>


<?php
  include 'google-maps.html';
  echo "<br>";
  include 'rodape.php';
?>
</body>
</html>