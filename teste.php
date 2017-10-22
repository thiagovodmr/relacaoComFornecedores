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
  <script src="recursos/jquery/jquery-3.2.1.min.js"></script>
  <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div id="espaco"></div>
<header>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" id="ss">SS Express</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <?php if($_SESSION['logado'] == True): ?>
        <?php if($llogin == "admin" && $ssenha=="admin"): ?>
          <li><a href="cadastro_Categoria.php">Inserir Categoria</a></li>
        <?php endif ?>
      <?php endif ?>
      <li><a href="usuario.php">Serviços</a></li>
      <li><a href="contatos.php">Contatos</a></li>
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

          echo "<ul class='nav navbar-nav'>";
            echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>Produtos<span class='caret'></span></a>
              <ul class='dropdown-menu'>
               <li><a href='meus_Produtos.php'>Meus Produtos</a></li>
               <li><a href='cadastro_Produtos.php'>Inserir Produtos</a></li>
              </ul>
           </li>
         </ul>";

          echo "<ul class='nav navbar-nav'>";
            echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>Olá, ".ucwords($re['USER_NOME'])."<span class='caret'></span></a>
              <ul class='dropdown-menu'>
               <li><a href='#meuPerfil'>Meu Perfil</a></li>
               <li><a href='logout.php'>Sair <i class='fa fa-user-circle fa-1x' aria-hidden='true'></i></a></li>
              </ul>
           </li>
         </ul>";

        }

        else{
          echo "<li><a href='cadastro_usuario.php'>Cadastre-se <span class='glyphicon glyphicon-user'></span> </a></li>
          <li><a href='login.php'>Entrar <span class='glyphicon glyphicon-log-in'></span></a></li>";
        }
      ?>
    </ul>
  </div>
</nav>
</header>

</body>
</html>