<?php
	include "cabecalho.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<meta charset="utf-8">
  <style type="text/css">
  .preto{
    color: black;
  }
  </style>
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>
<body>
</h1>
<div class="list-group" id="formulario">
	<h1>Categorias</h1>
  <a href="usuario.php?i=adesivos" class="list-group-item">ADESIVOS</a>
  <a href="usuario.php?i=apontador" class="list-group-item">APONTADOR</a>
  <a href="usuario.php?i=bamp" class="list-group-item">BLOCOS AUTOADESIVOS E MARCADORES DE PÁGINAS </a>
  <a href="usuario.php?i=cadernos" class="list-group-item">CADERNOS, BLOCOS E AGENDAS</a>
  <a href="usuario.php?i=clips" class="list-group-item">CLIPS, ALFINETES E ELÁSTICOS</a>
  <a href="usuario.php?i=colas" class="list-group-item">COLAS</a>
  <a href="usuario.php?i=crachas" class="list-group-item">CRACHÁS</a>
  <a href="usuario.php?i=embalagens" class="list-group-item">EMBALAGENS</a>
  <a href="usuario.php?i=encadernacao" class="list-group-item">ENCADERNAÇÃO</a>
  <a href="usuario.php?i=envelopes" class="list-group-item">ENVELOPES</a>
  <a href="usuario.php?i=escrita" class="list-group-item">ESCRITA E CORRETIVO</a>
  <a href="usuario.php?i=etiquetas" class="list-group-item">ETIQUETAS</a>
  <a href="usuario.php?i=ficharios" class="list-group-item">FICHÁRIOS E ACESSÓRIOS</a>
  <a href="usuario.php?i=fa" class="list-group-item">FITAS ADESIVAS</a>
  <a href="usuario.php?i=formularios" class="list-group-item">FORMULÁRIOS E IMPRESSOS</a>
  <a href="usuario.php?i=grampeadores" class="list-group-item">GRAMPEADORES E GRAMPOS</a>
  <a href="usuario.php?i=maescolar" class="list-group-item">MATERIAL ESCOLAR</a>
  <a href="usuario.php?i=mde" class="list-group-item">MATERIAL DE ESCRITÓRIO</a>
  <a href="usuario.php?i=meel" class="list-group-item">MOCHILAS ESCOLARES, ESTOJOS E LANCHEIRAS</a>
  <a href="usuario.php?i=pastas" class="list-group-item">PASTAS</a>
  <a href="usuario.php?i=reguas" class="list-group-item">RÉGUAS E COMPASSO</a>
  <a href="usuario.php?i=sp" class="list-group-item">SACOS PLÁSTICOS</a>
  <a href="usuario.php?i=te" class="list-group-item">TESOURAS E ESTILETES</a>
  <a href="usuario.php?i=lc" class="list-group-item">LIVROS PARA COLORIR</a>
  <a href="usuario.php?i=tintas" class="list-group-item">TINTAS</a>
</div>

<br>
<div id="formu">
<form action="usuario.php" method="POST">
	<input type="text" name="pesquisa" placeholder="Pesquisar Produtos">
	<input type="image" class="fa fa-search fa-3x" aria-hidden="true" value=" ">
</form>
</div>
<?php
// session_start();
// Corrigir erros!

if(!isset($_GET['i'])){
  $_GET['i'] = [];
}
if(!isset($_SESSION['login'])){
  $_SESSION['login'] = [];
}
if(!isset($_SESSION['senha'])){
  $_SESSION['senha'] = [];
}
//fim

$i = $_GET['i'];
$llogin = $_SESSION['login'];
$ssenha = $_SESSION['senha'];
$host = "localhost";
$usuario = "id2846308_pep1";
$senha = "@lunoifpe";
$bd = "id2846308_projeto1";
$strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');


if(isset($_POST["pesquisa"])){
  $pesquisa = $_POST["pesquisa"];
  $sql = "SELECT * FROM produtos WHERE PRO_TITULO  LIKE '%$pesquisa%' Or PRO_DESCRICAO LIKE '%$pesquisa%'";
  $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
  
  $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
  $re = mysqli_fetch_array($name);
 
  while($registro = mysqli_fetch_array($resultado)){
    $titulo = $registro['PRO_TITULO'];
    $preco = $registro['PRO_PRECO'];
    $descricao = $registro['PRO_DESCRICAO'];
    $imagem = $registro['PRO_ARQUIVO'];
    echo "<div class='row'>";
      echo "<div class='col-sm-6 col-md-4'>";
        echo "<div class='thumbnail'>";
        echo "<img src='".$imagem."' height='10' width='50'>";  
          echo "<div class='caption'>";
            echo "<h3><b class='preto'>$titulo</b></h3>";
            echo" <p>$descricao</p>";
            echo "<p><a class='btn btn-primary' role='button'>Preço: $preco,00</a> <a href='#' class='btn btn-default' role='button'>Link para o Produto</a></p>";
         echo"</div>
            </div>
          </div>
       </div>";
  }
}



else if($_GET['i']==[]){
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
$name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
  $re = mysqli_fetch_array($name);
  while($registro = mysqli_fetch_array($resultado)){
    $titulo = $registro['PRO_TITULO'];
    $preco = $registro['PRO_PRECO'];
    $descricao = $registro['PRO_DESCRICAO'];
    $descricao1 = wordwrap($descricao, 25, "\n", false);
    $imagem = $registro['PRO_ARQUIVO'];
    echo "<div class='row'>";
      echo "<div class='col-sm-6 col-md-4'>";
        echo "<div class='thumbnail'>";
        echo "<img src='".$imagem."' height='10' width='50'>";
          echo "<div class='caption'>";
            echo "<h3><b class='preto'>$titulo</b></h3>";
            echo "<p>$descricao1</p>";
            echo "<p><a class='btn btn-primary' role='button'>Link para o Produto</a> <a href='#' class='btn btn-default' role='button'>Preço: $preco,00</a></p>";
         echo"</div>
            </div>
          </div>
       </div>";
  }
}
else if(isset($_GET['i'])){
$sql = "SELECT * FROM produtos WHERE PRO_CATEGORIA = '$i'";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
  $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
  $re = mysqli_fetch_array($name);
  while($registro = mysqli_fetch_array($resultado)){
    $titulo = $registro['PRO_TITULO'];
    $preco = $registro['PRO_PRECO'];
    $descricao = $registro['PRO_DESCRICAO'];
    $imagem = $registro['PRO_ARQUIVO'];
    echo "<div class='row'>";
      echo "<div class='col-sm-6 col-md-4'>";
        echo "<div class='thumbnail'>";
        echo "<img src='".$imagem."' height='10' width='50'>";  
          echo "<div class='caption'>";
            echo "<h3><b class='preto'>$titulo</b></h3>";
            echo" <p>$descricao</p>";
            echo "<p><a class='btn btn-primary' role='button'>Preço: $preco,00</a> <a href='#' class='btn btn-default' role='button'>Link para o Produto</a></p>";
         echo"</div>
            </div>
          </div>
       </div>";
  }
}

mysqli_close($strcon);

include 'rodape.php';
?>
</body>
</html>