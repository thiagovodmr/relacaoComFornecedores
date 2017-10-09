<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/meus_Produtos.css">
	<title>Meus Produtos</title>
</head>
<body>

<div class="container" id="container">
    <div class="row">
		<div class="well">
        <h1 class="text-center">Meus Produtos</h1>
<?php
$llogin = $_SESSION['login'];
$ssenha = $_SESSION['senha'];
$host = "localhost";
$usuario = "id2846308_pep1";
$senha = "@lunoifpe";
$bd = "id2846308_projeto1";
$strcon = mysqli_connect("$host","$usuario","$senha","$bd") or die('Erro ao conectar ao banco!');
$sql = "SELECT * FROM produtos WHERE PRO_LOGIN = '$llogin'";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
$name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO, PRO_ID FROM produtos") or die(mysqli_error($strcon));
$re = mysqli_fetch_array($name);
while($registro = mysqli_fetch_array($resultado)){
$titulo = $registro['PRO_TITULO'];
$preco = $registro['PRO_PRECO'];
$descricao = $registro['PRO_DESCRICAO'];
$imagem = $registro['PRO_ARQUIVO'];
$id = $registro['PRO_ID'];
echo "<div class='list-group'>";
echo "<a href='bd/excluir_Produto.php?id="."$id"."'><i class='fa fa-window-close-o fa-3x' aria-hidden='true'></i></a>";
echo "<a href='#' class='list-group-item'>";
    echo "<div class='media col-md-3'>
        <figure class='pull-left'>
            <img class='media-object img-rounded img-responsive'  src='imagens/p1.jpg' alt='250'>
        </figure>
    </div>
    <div class='col-md-6'>";
        echo "<h4 class='list-group-item-heading'>"."$titulo"."</h4>";
		echo "<p class='list-group-item-text'>"."$descricao";
        echo "</p>
    </div>
    <div class='col-md-3 text-center'>";
        echo "<button type='button' class='btn btn-default btn-lg btn-block'>"."Preço: $preco".",00</button>";
    echo "</div>
</a>
</div>";
        
}
mysqli_close($strcon);
?>
        </div>
	</div>
</div>
<?php
include 'rodape.php';
?>
</body>
</html>