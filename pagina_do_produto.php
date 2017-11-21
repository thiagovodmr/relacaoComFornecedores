<?php 
	include_once "cabecalho.php";
	$dbname = "id2846308_projeto1";
	$usuario="id2846308_pep1";
	$senha = "@lunoifpe";
	try {
	  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

	$id = $_GET["id"];
	$query = "SELECT p.*,u.USER_EMPRESA,c.CAT_NOME 
	FROM produtos AS p INNER JOIN usuarios AS u ON p.PRO_USER_ID = u.USER_ID inner join categorias as c on PRO_CATEGORIA = CAT_ID
	where PRO_ID = :id ";
	
	$stmt = $conn->prepare($query);
	$stmt->bindParam(":id",$id);
	$result = $stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/meu_Perfil.css">
	<style>
		img{
			border: 1px solid red;
			/*width: 98%;*/
		}
		.largura{
			width: 98%;
		}
		h2{
			/*text-decoration: underline;*/
			text-align: center;
		}
		.produtos_fornecedor{
			padding: 20px;
			border: 1px solid black;
			overflow: auto;
			height: 380px;
			margin-bottom: 40px;
		}
	</style>
</head>
<body>
	
<div class='container' id='contai'>
    <header class='page-header'>
    	<h1 class='page-title'><?= ucwords($row["PRO_TITULO"]) ?></h1>
  	</header>
  	<div class="row">
		<div class='resume'>
		    <div class='panel panel-default'>
			      <div class='panel-heading resume-heading'>
			      		<div class="row">
			      		<div class="col-md-5 col-sm-5">
							<img class="largura" src=<?= $row["PRO_ARQUIVO"] ?>>
				        </div>
				        <div class="col-md-6 col-sm-6">

							            <ul class='list-group'>
							          		<li class='list-group-item'>
							          			<b>Fornecedor  :</b>
							          			<?=$row["USER_EMPRESA"]  ?>
							          		</li>
							          		<li class='list-group-item'>
							          			<b>Preço  :</b>
							          			<?="R$ ".$row["PRO_PRECO"]  ?>
							          		</li>
							          		<li class='list-group-item'>
							          			<b>Categoria  :</b>
							          			<?=$row["CAT_NOME"]  ?>
							          		</li>
							        	</ul>
								      <div class='bs-callout bs-callout-danger'>
										    <h4>Descrição</h4>
										    <?= $row["PRO_DESCRICAO"]  ?>
								      </div>
						            
				        </div>
			      </div>
			      </div>
			</div>
		</div>
	</div>
</div>


<?php 
	$stmt2 = $conn->prepare("SELECT * from produtos inner join usuarios on PRO_USER_ID = USER_ID
		where PRO_USER_ID = :fornecedorPro and PRO_ID != :idPro");
	
	$stmt2->bindParam(":fornecedorPro", $row["PRO_USER_ID"]);
	$stmt2->bindParam(":idPro", $row["PRO_ID"]);

	$result = $stmt2->execute();

 ?>

<div class="container">
<div class="row"><h2>Produtos do mesmo fornecedor</h2></div>
	<div class="produtos_fornecedor col-md-10 col-md-offset-1">
		<div class="row">
			<?php  
			while($registro = $stmt2->fetch(PDO::FETCH_ASSOC)):
                  $perfil = $registro['USER_PERFIL'];
                  $nome_fornecedor = $registro['USER_EMPRESA']; 
                  $titulo = $registro['PRO_TITULO'];
                  $preco = $registro['PRO_PRECO'];
                  $imagem = $registro['PRO_ARQUIVO'];
                  $id = $registro["PRO_ID"];
                ?>
                
                  <div class='col-sm-4 col-md-4'>
                      <div class='thumbnail'>
                        <img class="largura" src=<?= $imagem ?> height='10' width='50'>  
                          <div class='caption'>
                            <h3><a href=pagina_do_produto.php?id=<?= $id ?> ><b class='preto'><?= $titulo ?></b></a></h3>
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
           ?>
	</div>
	</div>
</div>


<?php 
	$stmt3 = $conn->prepare("SELECT * from produtos inner join usuarios on PRO_USER_ID = USER_ID
		where PRO_CATEGORIA = :CategoriaPro and PRO_ID != :idPro");
	
	$stmt3->bindParam(":CategoriaPro", $row["PRO_CATEGORIA"]);
	$stmt3->bindParam(":idPro", $row["PRO_ID"]);

	$resultado = $stmt3->execute();

 ?>

<div class="row"><h2>Produtos da mesma categoria</h2></div>
<div class="container">
	<div class="produtos_fornecedor col-md-10 col-md-offset-1">
		<div class="row">
			<?php  
			while($regist = $stmt3->fetch(PDO::FETCH_ASSOC)):
                  $perfil = $regist['USER_PERFIL'];
                  $nome_fornecedor = $regist['USER_EMPRESA']; 
                  $titulo = $regist['PRO_TITULO'];
                  $preco = $regist['PRO_PRECO'];
                  $imagem = $regist['PRO_ARQUIVO'];
                  $id = $regist["PRO_ID"];
                ?>
                
                  <div class='col-sm-4 col-md-4'>
                      <div class='thumbnail'>
                        <img class="largura" src=<?= $imagem ?> height='10' width='50'>  
                          <div class='caption'>
                            <h3><a href=pagina_do_produto.php?id=<?= $id ?>><b class='preto'><?= $titulo ?></b></a></h3>
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
           ?>
	</div>
	</div>
</div>


<?php
include 'rodape.php';
?>

</body>
</html>