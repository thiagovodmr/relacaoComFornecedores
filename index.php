<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <header>
      <div class="container header inner">
      <nav class="navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php">SSexpress</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right masthead-nav">
              <li> <a href="usuario.php">Serviços</a></li>
              <li> <a href="contatos.php">Contatos</a></li>
              <li><a href="quemsomos.php">Quem somos</a></li>
              <li><a href="login.php">Login <i class="fa fa-sign-in fa-1x" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
      </div>
    </header>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="#"> Outra funcionalide</a>
      <a href="#"> Outra funcionalide</a>
      <a href="#"> Outra funcionalide</a>
    </div>

    <span style="font-size:30px;cursor:pointer;float:right;color:#fff;position:absolute;top:5%;right: 10px;" onclick="openNav()">☰</span>

  </div>
  </div>
  
<script src="javascript/index.js"></script>

<?php
include 'rodape.php';
?>
</body>
</html>