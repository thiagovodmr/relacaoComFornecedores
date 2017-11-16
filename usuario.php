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
  <link rel="stylesheet" type="text/css" href="css/usuario2.css">
</head>
<body>

<div class="row">
  <div class="col-md-6 col-md-offset-4">
    <form action="usuario.php" method="POST">
      <label>Filtro por preço:</label>
      <select name="filtro">
        <option value="0,10">abaixo de 10</option>
        <option value="11,20">11 a 20</option>
        <option value="21,30">21 a 30</option>
        <option value="31,40">31 a 40</option>
        <option value="41,50">41 a 50</option>
        <option value="50,100">50 a 100</option>
        <option value="101,20000">acima de 100</option>
      </select>
      <input type="submit" Value="Filtrar">
    </form>
  </div>
</div>

<div class="row">
  <div class="col-md-3 col-sm-3 text-center">
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
            // $resul = mysqli_fetch_array($nnn);
            // $tamanho = sizeof($resul);
            $tamanho = mysqli_num_rows($nnn);
            if ($_SESSION['logado']): 
        
              if ($ssenha == "pep1" && $llogin == "admin"): ?>
                <a href='bd/excluir_Categoria.php?id=<?= $id ?>'>
                  <i class='fa fa-window-close-o fa-2x' aria-hidden='true' id='icone'></i>
                </a>
                <a href="usuario.php?i=<?=$id?>" class='list-group-item justify-content-between'><?= strtoupper($nome)?><span class="badge badge-success badge-pill" style="background-color: green;"><?= $tamanho?></span></a>
            
        <?php else: ?>
               <a href="usuario.php?i=<?=$id?>" class='list-group-item justify-content-between'><?= strtoupper($nome)?><span class="badge badge-success badge-pill" style="background-color: green;"><?= $tamanho?></span></a>
        <?php endif ?>

      <?php else: ?>
          <a href="usuario.php?i=<?=$id?>" class='list-group-item justify-content-between'><?= strtoupper($nome)?><span class="badge badge-success badge-pill" style="background-color: green;"><?= $tamanho?></span></a>

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
            // $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO FROM produtos") or die(mysqli_error($strcon));
            // $re = mysqli_fetch_array($name);
            $r = mysqli_num_rows($resultado); 
            ?>
            
            <?php if ($r==0): ?>
               <div class='col-md-8' style='text-align:center;'><h3>Nenhum produto encontrado</h3></div> 
            
            <?php else: ?>
              <?php  
              while($registro = mysqli_fetch_array($resultado)): 
                $perfil = $registro['PRO_PERFIL'];
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
                        <h3><a href="#linkParaoProduto"><b class='preto'><?= $titulo ?></b></a></h3>
                        <p>
                          <a class='btn btn-info' role='button'>Preço: <?= $preco.",00" ?></a> 
                          <a href=perfil.php?id=<?= $perfil ?> class='btn btn-warning' role='button'>
                          Fornecedor: <?= ucwords($nome_fornecedor) ?>
                          </a>
                        </p>
                      </div>
                  </div>
              </div>

            <?php endwhile;?>

            <?php endif ?>


          <?php elseif (isset($_POST["filtro"])) :
                
                $arr = explode(",",$_POST["filtro"]);
                $sql = "SELECT * FROM produtos WHERE
                 PRO_PRECO >= '$arr[0]' AND PRO_PRECO <= '$arr[1]' ";
            $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
              // $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO, PRO_NOME, PRO_PERFIL FROM produtos") or die(mysqli_error($strcon));
              // $re = mysqli_fetch_array($name);
            $r = mysqli_num_rows($resultado);
          
             if ($r==0): ?>
                <div class='col-md-8' style='text-align:center;'>
                  <h3>Nenhum produto encontrado</h3>
                </div> 
            
            <?php else: ?>
                <?php 
                while($registro = mysqli_fetch_array($resultado)): 
                  $perfil = $registro['PRO_PERFIL'];
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
                            <h3><a href="#linkParaoProduto"><b class='preto'><?= $titulo ?></b></a></h3>
                            <p>
                              <a class='btn btn-info' role='button'>Preço: <?= $preco.",00" ?></a> 
                              <a href=perfil.php?id=<?= $perfil ?> class='btn btn-warning' role='button'>
                              Fornecedor: <?= ucwords($nome_fornecedor) ?>
                              </a>
                            </p>
                          </div>
                      </div>
                  </div>
                 
          <?php 
              endwhile;
            endif ?>

        <?php
        elseif($_GET['i']==[]): 

            $sql = "SELECT * FROM produtos";
            $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
            
            $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
            $total = mysqli_num_rows($resultado);
            $registros = 15;
            $numPaginas = ceil($total/$registros);
            $inicio = ($registros*$pagina)-$registros;


            $cmd = "SELECT * FROM produtos LIMIT $inicio, $registros"; 
            $produtos = mysqli_query($strcon,$cmd); 
            $total = mysqli_num_rows($produtos); 
         

           while($registro = mysqli_fetch_array($produtos)):  
              $perfil = $registro['PRO_PERFIL'];      
              $titulo = $registro['PRO_TITULO'];
              $preco = $registro['PRO_PRECO'];
              $descricao = $registro['PRO_DESCRICAO'];
              $descricao1 = wordwrap($descricao, 25, "\n", false);
              $imagem = $registro['PRO_ARQUIVO'];
              $nome_fornecedor = $registro['PRO_NOME'];
             ?>

              <div class='col-sm-8 col-md-4'>
                  <div class='thumbnail'>
                    <img src=<?= $imagem ?> height='10' width='50'>  
                      <div class='caption'>
                        <h3><a href="#linkParaoProduto"><b class='preto'><?= $titulo ?></b></a></h3>
                        <p>
                          <a class='btn btn-info' role='button'>Preço: <?= $preco.",00" ?></a> 
                          <a href=perfil.php?id=<?= $perfil ?> class='btn btn-warning' role='button'>
                          Fornecedor: <?= ucwords($nome_fornecedor) ?>
                          </a>
                        </p>
                      </div>
                  </div>
              </div>
         <?php endwhile; 
            
        elseif (isset($_GET['i']) || isset($id)): 
      
            $sql = "SELECT * FROM produtos WHERE PRO_CATEGORIA = '$i'";
            $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
              // $name = mysqli_query($strcon, "SELECT PRO_TITULO, PRO_PRECO, PRO_DESCRICAO, PRO_ARQUIVO, PRO_NOME, PRO_PERFIL FROM produtos") or die(mysqli_error($strcon));
              // $re = mysqli_fetch_array($name);
            $r = mysqli_num_rows($resultado);
            ?>
            <?php if ($r==0): ?>
                <div class='col-md-8' style='text-align:center;'><h3>Nenhum produto encontrado</h3></div> 
            <?php else: ?>
                <?php 
                while($registro = mysqli_fetch_array($resultado)): 
                  $perfil = $registro['PRO_PERFIL'];
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
                            <h3><a href="#linkParaoProduto"><b class='preto'><?= $titulo ?></b></a></h3>
                            <p>
                              <a class='btn btn-info' role='button'>Preço: <?= $preco.",00" ?></a> 
                              <a href=perfil.php?id=<?= $perfil ?> class='btn btn-warning' role='button'>
                              Fornecedor: <?= ucwords($nome_fornecedor) ?>
                              </a>
                            </p>
                          </div>
                      </div>
                  </div>
                 
          <?php 
              endwhile;
            endif 
          ?>
<?php  endif;  ?>
  </div>
</div>



    <div class="row">

    <div id="paginacao" class="col-md-8 col-md-offset-4">

<nav aria-label="Page navigation">
  <ul class="pagination">
    <?php if (isset($numPaginas)): ?>
    <?php for($i=1;$i<($numPaginas+1);$i++): ?>
    <li class="page-item"><a class="page-link" id="pag" href="usuario.php?pagina=<?= $i ?>"><?=$i?></a></li>
    <?php endfor; ?>
    <?php endif ?>
  </ul>
</nav>
</div>
</div>

<?php  
mysqli_close($strcon);
include 'rodape.php';
?>

</body>
</html>