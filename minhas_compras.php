<?php
include "cabecalho.php";
include 'security.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Minhas Compras</title>
	<style type="text/css">
	h1{
		text-align: center;
	}
	#foto{
		width: 220px;
		margin: 5px;
	}
	#vendas a{
		font-size: 20px;
	}
	img{
		border: 1px solid red;
		/*width: 98%;*/
	}
	.largura{
		width: 100%;
	}
	.thumbnail{
		background-color: #C2EBDD;
	}
	.caption{
		width: 100%;
	}
	button:hover{

	}
</style>
</head>
<body>
	<div id="vendas">
		<h1>Produtos Comprados</h1>
		<hr>
		<hr>
		<?php
		$larguras = [0,5,54,100];

		session_start();

		$dbname = "id2846308_projeto1";
		$usuario = "id2846308_pep1";
		$senha = "@lunoifpe";

		try{
			$conn = new PDO("mysql:host=localhost;dbname=$dbname",$usuario,$senha);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Falha na conexão: ". $e->getMessage();
		}
		$id = $_SESSION['id'];


		$sql1 = "SELECT p.*, c.* ,u.* FROM produtos as p inner join compra as c on c.COM_PRODUTO = p.PRO_ID inner join usuarios as u on c.COM_VENDEDOR = u.USER_ID WHERE COM_COMPRADOR = '$id'";

		foreach ($conn->query($sql1) as $row1):
			$nome = $row1['USER_EMPRESA'];
			$status = $row1['COM_STATUS'];
			$compraid1 = $row1['COM_ID'];
			$perfil = $row1['USER_PERFIL'];
			$prodir = $row1['PRO_ID'];
			$datetime = $row1['COM_DATA'];
			$explode = explode(" ", $datetime);
			$horario = date('H:i:s', strtotime($explode[1]));
			$data = date('d/m/Y', strtotime($explode[0]));
			
			?>
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class='container' id='contai'>
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class='resume'>
								<div class='panel panel-default'>
									<div class='panel-heading resume-heading'>
										<div class="row">
											<div class="col-md-5 col-sm-5">
												<img class="largura" src=<?= $row1["PRO_ARQUIVO"] ?>> <br>
													<?php
													if($status==0){
														echo "<h3><b>Status da compra:</b></h3> <p><h4>Aguardando confirmação do fornecedor</h4>";
													}
													elseif($status==1){
														echo "<h3><b>Status da compra:</h3></b> <h4>Compra aceita, aguarde o produto!</h4>";	
													}
													elseif($status==2){
														echo "<h3><b>Status da compra:</h3><a href='bd/update_compra.php?status=$status&idcompra=$compraid'><button class='btn btn-success'>Confirma entrega</button></a>";	
													}
													echo "<hr>";
													?>
											</div>
											<div class="col-md-6 col-sm-6">

												<ul class='list-group'>
													<li class='list-group-item'>
														<b>Vendedor  :</b>
														<a href="perfil.php?id=<?=$perfil?>"><?=$row1["USER_EMPRESA"]  ?></a>
													</li>
													<li class='list-group-item'>
														<b>Produto  :</b>
														<a href="pagina_do_produto.php?id=<?=$prodir ?>"><?=$row1["PRO_TITULO"]  ?></a>
													</li>
													<li class='list-group-item'>
														<b>Preço: </b>
														R$ <i id="precop"> <?=$row1["COM_PRECO"] ?> </i>
													</li>
													<li class='list-group-item'>
														<b>Quantidade  :</b>
														<?=$row1["COM_QUANTIDADE"]  ?>
													</li>
													<li class='list-group-item'>
														<b>Data  :</b>
														<?=$data  ?>
													</li>
													<li class='list-group-item'>
														<b>Horário  :</b>
														<?=$horario  ?>
													</li>
												</ul>
											</div>
										</div>
										<p style="text-align: center;">Progresso da Venda</p>
									</div>

									<div class='container'>
										<div class='row'>
											<div class='col-md-1 col-sm-1'>
												<i class='fa fa-money fa-2x' aria-hidden='true'></i>
											</div>
											<div class='col-md-1 col-md-offset-3 col-sm-1 col-sm-offset-2'>
												<i class='fa fa-truck fa-2x' aria-hidden='true'></i>
											</div>
											<div class='col-md-1 col-md-offset-2 col-sm-1 col-sm-offset-2'>
												<i class='fa fa-check fa-2x' style='color:green; margin-left: 50%;'  aria-hidden='true'></i>
											</div>
										</div>
										<div class='row'>
											<div class='col-md-8 col-sm-8'>
												<div class='progress progress-striped'>

													<div class='progress-bar progress-bar-success' role='progressbar' style='width:<?= $larguras[$row1['COM_STATUS']]?>%'>
														<span class='sr-only'>35% Complete (success)</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			<br>
			<hr>
		<?php endforeach; ?>
	</div>
</body>
</html>