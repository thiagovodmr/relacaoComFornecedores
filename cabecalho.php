<?php
session_start();
  if(!isset($_SESSION['logado'])){
    $_SESSION['logado'] = [];
  }
  if(isset($_SESSION["login"]) && isset($_SESSION["senha"])){
    $llogin = $_SESSION['login']; 
    $ssenha = $_SESSION['senha'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="/imagens/ss-logo-s.ico" type="image/x-icon" />  
  <link rel="stylesheet" type="text/css" href="/recursos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/recursos/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/cabecalho.css">
  <script src="/recursos/jquery/jquery-3.2.1.min.js"></script>
  <script src="/recursos/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div id="espaco"></div>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/index.php" id="ss">SS Express</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <?php if($_SESSION['logado'] == True): ?>
        <?php if($llogin == "admin" && $ssenha=="ae99fd4697031835c5c2d54d49409db4"): ?>
          <li><a href="/cadastro_Categoria.php">Inserir Categoria <i class="fa fa-cloud-upload" aria-hidden="true"></i></a></li>
        <?php endif ?>
      <li><a href="/rotas.php">Traçar Rotas <i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
      <li><a href="/fornecedores.php">Fornecedores <i class="fa fa-map-o" aria-hidden="true"></i></a></li>
      <li><a href="/usuario.php">Serviços <i class="fa fa-truck" aria-hidden="true"></i></a></li>
      <?php endif ?>
      <li><a href="/contatos.php">Contatos <i class="fa fa-address-book-o" aria-hidden="true"></i></a></li>
      <li><a href="/quemsomos.php">Quem somos <i class="fa fa-users" aria-hidden="true"></i></a></li>
      <?php
        if($_SESSION['logado'] == True):
          $host = "localhost";
          $usuario = "id2846308_pep1";
          $senha = "@lunoifpe";
          $bd = "id2846308_projeto1";
          $strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
         
         
          $name = mysqli_query($strcon, "SELECT USER_ID,USER_EMPRESA,USER_NOME,USER_PERFIL FROM usuarios WHERE USER_LOGIN = '$llogin' and USER_SENHA = '$ssenha'") or die(mysqli_error($strcon));
         
          $re = mysqli_fetch_array($name);
          $_SESSION['nome'] = $re['USER_NOME'];
          $_SESSION['empresa'] = $re['USER_EMPRESA'];
          $_SESSION['perfil'] = $re['USER_PERFIL'];
          $_SESSION["id"] = $re["USER_ID"];
          $id = $re["USER_PERFIL"];

          $sql = mysqli_query($strcon, "SELECT * FROM mensagens WHERE MEN_DESTINATARIO = '$id' and MEN_LIDA = 0") or die(mysqli_error($strcon));

          $quant = mysqli_num_rows($sql);
          ?>
          
          <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Produtos <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <li><a href="/meus_Produtos.php">Meus Produtos <i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
                <li><a href="/cadastro_Produtos.php">Inserir Produtos <i class="fa fa-upload" aria-hidden="true"></i></a></li>
              </ul>
           </li>
         </ul>

          <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Olá, <?= ucwords($re["USER_EMPRESA"]) ?> <i class="fa fa-user-circle" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
               <li><a href="/meu_Perfil.php">Editar Perfil <i class="fa fa-user-circle fa-1x" aria-hidden="true"></i></a></li>
                <li><a href="/minhas_vendas.php">Minhas Vendas <i class="fa fa-money" aria-hidden="true"></i></a></li>
                <li><a href="/minhas_compras.php">Minhas Compras <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
               <li><a href="/mensagens.php">Mensagens <i class="fa fa-comments fa-1x" aria-hidden="true"><span class="badge"><?= $quant ?> </span></i></a></li>
               <li><a href="/logout.php">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              </ul>
           </li>
         </ul>
          
          <?php else:
          echo "<li><a href='/cadastro_usuario.php'>Cadastre-se <span class='glyphicon glyphicon-user'></span> </a></li>
          <li><a href='login.php'>Entrar <span class='glyphicon glyphicon-log-in'></span></a></li>";
          endif
          ?>
    </ul>
  </div>
</nav>