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
<?php
// session_start();
$llogin = $_SESSION['login'];
$ssenha = $_SESSION['senha'];
$host = "localhost";
$usuario = "id2846308_pep1";
$senha = "@lunoifpe";
$bd = "id2846308_projeto1";
$strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');

$name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
$re = mysqli_fetch_array($name);

while($registro = mysqli_fetch_array($resultado)){
  $titulo = $registro['PRO_TITULO'];
  $preco = $registro['PRO_PRECO'];
  $descricao = $registro['PRO_DESCRICAO'];
echo "<div class='row'>";
  echo "<div class='col-sm-6 col-md-4'>";
    echo "<div class='thumbnail'>";
      echo "<img src='imagens/p1.jpg' alt=''>";
        echo "<div class='caption'>";
          echo "<h3>$titulo</h3>";
          echo" <p>$descricao</p>";
          echo "<p><a class='btn btn-primary' role='button'>$preco,00</a> <a href='#' class='btn btn-default' role='button'>Link para o Produto</a></p>";
      echo"</div>
        </div>
      </div>
    </div>";
mysqli_close($strcon);
}
?>
<?php
include 'rodape.php';
?>
</body>
</html>