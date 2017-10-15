<?php
	include "cabecalho.php";
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>
<body>

<div class="list-group" id="formulario">
	<h1>Categorias</h1>
  <?php 
    $sql = "SELECT * FROM categorias";
    $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
    $name = mysqli_query($strcon, "SELECT CAT_NOME,CAT_ID FROM categorias") or die(mysqli_error($strcon));
    $re = mysqli_fetch_array($name);
    while($registro = mysqli_fetch_array($resultado)){
      $nome = $registro['CAT_NOME'];
      $id = $registro['CAT_ID'];
      if($_SESSION['logado']){
          if($ssenha == "admin" && $llogin == "admin"){
              echo "<a href='bd/excluir_Categoria.php?id=".$id."'><i class='fa fa-window-close-o fa-2x' aria-hidden='true' id='icone'></i></a>";
              echo "<a href='usuario.php?i=".$id."' class='list-group-item'>".strtoupper($nome)."</a>";
          }
          else{
            echo "<a href='usuario.php?i=".$id."' class='list-group-item'>".strtoupper($nome)."</a>";
          }
      }
      else{
          echo "<a href='usuario.php?i=".$id."' class='list-group-item'>".strtoupper($nome)."</a>";
      }
    }
  ?>
  <a href="usuario.php" class="list-group-item">SEM CATEGORIA</a>
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
      echo "<div class='col-sm-8 col-md-4'>";
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
      echo "<div class='col-sm-8 col-md-4'>";
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
else if(isset($_GET['i']) || isset($id)){
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
      echo "<div class='col-sm-8 col-md-4'>";
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