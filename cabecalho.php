<?php
session_start();
  if(!isset($_SESSION['logado'])){
    $_SESSION['logado'] = [];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/cabecalho.css">
  <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
  <script src="recursos/jquery/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/cabecalho_login.css">
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
              <?php
              if($_SESSION['logado'] == True){
                    $llogin = $_SESSION['login'];
                    $ssenha = $_SESSION['senha'];
                    $host = "localhost";
                    $usuario = "id2846308_pep1";
                    $senha = "@lunoifpe";
                    $bd = "id2846308_projeto1";
                    $strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
                    $sql = "SELECT * FROM usuarios WHERE USER_LOGIN = '$llogin' and USER_SENHA = '$ssenha'";
                    $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
                    $name = mysqli_query($strcon, "SELECT USER_NOME FROM usuarios WHERE USER_LOGIN = '$llogin' and USER_SENHA = '$ssenha'") or die(mysqli_error($strcon));
                    $re = mysqli_fetch_array($name);
                    $_SESSION['nome'] = $re['USER_NOME'];
                    
                    echo "<li><div class='dropdown'>
                    <button class='dropbtn'><a href='#'><b class='branco'>Olá, ".ucfirst($re['USER_NOME'])." <i class='fa fa-user-circle fa-1x' aria-hidden='true'></i></b></a></button>
                    <div class='dropdown-content'>
                      <a href='#meuPerfil'>Meu Perfil <i class='fa fa-user-o' aria-hidden='true'></i></a>
                      <a href='meus_Produtos.php'>Produtos</a>
                      <a href='logout.php'>Sair <i class='fa fa-power-off' aria-hidden='true'></i></a>
                    </div>
                  </div></li>";
              }
              ?>
              
              <?php
              if($_SESSION['logado'] == False){
                    echo "<li><a href='login.php'>Entrar <i class='fa fa-sign-in fa-1x' aria-hidden='true'></i></a></li>"; 
                }
              ?>
            </ul>
          </div>
        </div>
      </nav>
      </div>
    </header>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <?php if ($_SESSION['logado']==True): ?>
        <a href="cadastro_Produtos.php">Inserir Produtos</a>
        <?php if ($llogin == "admin" && $ssenha=="admin"): ?>
          <a href="cadastro_Categoria.php">Inserir Categoria</a>
        <?php endif ?>
      <?php endif ?>
      <a href="#">Outra funcionalide</a>
    </div>

    <span style="font-size:30px;cursor:pointer;float:right;color:#fff;position:absolute;top:5%;right: 10px;" onclick="openNav()">☰</span>

  </div>
  </div>
  
<script src="javascript/cabecalho.js"></script>

</body>
</html>