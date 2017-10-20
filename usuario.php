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

<div class="row">
  <div class="col-md-3 col-sm-3">
    <h1>Categorias</h1>
  </div>

  <div class="col-md-6 col-sm-6 col-md-offset-2 col-sm-offset-2">
    <div id="formu">
      <form action="usuario.php" method="POST">
        <input type="text" name="pesquisa" placeholder="Pesquisar Produtos">
        <input type="image" class="fa fa-search fa-3x" aria-hidden="true" value=" ">
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-md-3 col-sm-4">

    <div class="list-group" id="formulario">
      <?php 
        $sql = "SELECT * FROM categorias ORDER BY CAT_NOME";
        $kk = "SELECT * FROM produtos";
        $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
        $rr = mysqli_query($strcon, $kk) or die('Erro ao tentar cadastrar registro');
        $name = mysqli_query($strcon, "SELECT CAT_NOME,CAT_ID FROM categorias") or die(mysqli_error($strcon));
        
        while($registro = mysqli_fetch_array($resultado)):
          $nome = $registro['CAT_NOME'];
            $id = $registro['CAT_ID'];
            $nnn = mysqli_query($strcon, "SELECT PRO_CATEGORIA FROM produtos WHERE PRO_CATEGORIA = '$id'") or die(mysqli_error($strcon));
            $resul = mysqli_fetch_array($nnn);
            $tamanho = sizeof($resul['PRO_CATEGORIA']);
            
             if ($_SESSION['logado']): 
        
             if ($ssenha == "admin" && $llogin == "admin"): ?>
                <a href='bd/excluir_Categoria.php?id=<?= $id ?>'>
                  <i class='fa fa-window-close-o fa-2x' aria-hidden='true' id='icone'></i>
                </a>
                <a href="usuario.php?i=<?=$id?>" class='list-group-item'><?= strtoupper($nome)."($tamanho)"?></a>
            
            <?php else: ?>
               <a href="usuario.php?i=<?=$id?>" class='list-group-item'><?= strtoupper($nome)."($tamanho)"?></a>
            <?php endif ?>

        <?php else: ?>
          <a href="usuario.php?i=<?=$id?>" class='list-group-item'><?= strtoupper($nome)."($tamanho)"?></a>

    <?php 
        endif; 
      endwhile;
     ?>

      <a href="usuario.php" class="list-group-item">SEM CATEGORIA</a>
    </div>
  </div>
  <br>

  <div class="col-md-9 col-sm-8">
    <?php if (isset($_POST["pesquisa"])): 
      
        $pesquisa = $_POST["pesquisa"];
        $sql = "SELECT * FROM produtos WHERE PRO_TITULO  LIKE '%$pesquisa%' Or PRO_DESCRICAO LIKE '%$pesquisa%'";
        $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
        $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
        $re = mysqli_fetch_array($name); 
        ?>


        <?php  
         while($registro = mysqli_fetch_array($resultado)): 
          
            $titulo = $registro['PRO_TITULO'];
            $preco = $registro['PRO_PRECO'];
            $descricao = $registro['PRO_DESCRICAO'];
            $imagem = $registro['PRO_ARQUIVO'];
            $nome_fornecedor = $registro['PRO_NOME'];
           ?>
           
            <div class='col-sm-8 col-md-4'>
                <div class='thumbnail'>
                  <img src=<?= $imagem ?> height='10' width='50'>  
                    <div class='caption'>
                      <h3><b class='preto'><?= $titulo ?></b></h3> 
                      <p><?= $descricao ?></p>
                      <p>
                        <a class='btn btn-primary' role='button'>Preço:<?= $preco,00 ?> </a> 
                        <a href='#linkParaoProduto' class='btn btn-default' role='button'>
                        Link para o Produto</a>
                      </p>
                      <p>
                        <a href='#linkParaoFornecedor' class='btn btn-default' role='button'>
                        Fornecedor:<?= $nome_fornecedor ?> 
                        </a>
                      </p>
                  </div>
                </div>
            </div>

        <?php endwhile; 

     elseif($_GET['i']==[]): 

        $sql = "SELECT * FROM produtos";
        $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
        $nnome = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));

        $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
        $re = mysqli_fetch_array($name);
      
       while($registro = mysqli_fetch_array($resultado)): 
        
          $titulo = $registro['PRO_TITULO'];
            $preco = $registro['PRO_PRECO'];
            $descricao = $registro['PRO_DESCRICAO'];
            $descricao1 = wordwrap($descricao, 25, "\n", false);
            $imagem = $registro['PRO_ARQUIVO'];
            $nome_fornecedor = $registro['PRO_NOME'];
         ?>

          <div class='col-sm-8 col-md-4'>
              <div class='thumbnail'>
                <img src=<?= $imagem?> height='10' width='50'>
                    <div class='caption'>
                      <h3><b class='preto'><?= $titulo ?></b></h3>
                      <p><?= $descricao1 ?></p>
                      <p>
                        <a class='btn btn-primary' role='button'>Preço:<?= $preco,00 ?> </a> 
                        <a href='#linkParaoProduto' class='btn btn-default' role='button'>Link para o Produto</a>
                      </p>
                      <p>
                        <a href='#linkParaoFornecedor' class='btn btn-default' role='button'>
                        Fornecedor:<?= $nome_fornecedor ?> 
                        </a>
                      </p>
                  </div>
                </div>
                </div>
     <?php endwhile; 
        
     elseif (isset($_GET['i']) || isset($id)): 
      
        $sql = "SELECT * FROM produtos WHERE PRO_CATEGORIA = '$i'";
        $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
          $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
          $re = mysqli_fetch_array($name);
       
        while($registro = mysqli_fetch_array($resultado)): 
          
            $titulo = $registro['PRO_TITULO'];
              $preco = $registro['PRO_PRECO'];
              $descricao = $registro['PRO_DESCRICAO'];
              $imagem = $registro['PRO_ARQUIVO'];
              $nome_fornecedor = $registro['PRO_NOME']; 
            ?>
            
              <div class='col-sm-8 col-md-4'>
                  <div class='thumbnail'>
                    <img src=<?= $imagem ?> height='10' width='50'>  
                      <div class='caption'>
                        <h3><b class='preto'><?= $titulo ?></b></h3>
                        <p><?= $descricao ?></p>
                        <p>
                          <a class='btn btn-primary' role='button'>Preço:<?= $preco,00 ?></a> <a href='#linkParaoProduto' class='btn btn-default' role='button'>Link para o Produto</a>
                        </p>
                        <p>
                          <a href='#linkParaoFornecedor' class='btn btn-default' role='button'>
                          Fornecedor: <?= $nome_fornecedor ?>
                          </a>
                        </p>
                    </div>
                    </div>
                </div>
             
      <?php endwhile;
          endif;  
      ?>
  </div>
</div>

<?php  
mysqli_close($strcon);
include 'rodape.php';

?>

</body>
</html>