<?php 
include_once "cabecalho.php";
include 'security.php';
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

$query = "SELECT p.*,u.USER_EMPRESA,u.USER_ID,c.CAT_NOME,u.USER_LATITUDE,u.USER_LONGITUDE,u.USER_PERFIL 
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
	<title>Comprar Produto</title>
	<link rel="stylesheet" type="text/css" href="css/pagina_produto.css">
</head>
<body>
	
	<div class='container' id='contai'>
		<div class="row">
			<div class="col-md-8">
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
												<b>Preço: </b>
												R$ <i id="precop"> <?=$row["PRO_PRECO"] ?> </i>
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
										<?php if ($_SESSION["logado"] == true and $row["USER_ID"]!= $_SESSION["id"]): ?>

											<form action="/compras/cadastrar_compras.php?id=<?= $id ?>" method="POST" id="formId"><p>
												<input type="number" name="preco" id="preco" class="hide">
												Quantidade: <input type="number" name="quantidade" id="quantidade"></p>
												<p><button type="submit" class="comprar">
													COMPRAR <i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button></p>
											</form>

											<script>
												$(document).ready(function(){
													$("#preco").val(<?=$row["PRO_PRECO"] ?>);
													$("#quantidade").val(1);
													var preco = <?=$row["PRO_PRECO"] ?>;
													$("#quantidade").on("change", function(){
														
														$("#precop").html($(this).val() * preco); 
														$("#preco").val($("#precop").html());

														if($(this).val() == 0 || $(this).val() == null || $(this).val() == "" || $(this).val() < 0 || $(this).val() == "e"){
															$('#formId').attr('action', '#');
															alert("Digite uma quantidade válida!");
														}

													})
												});
											</script>  

										<?php endif ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h2>Localização</h2>
				<div id="map"></div>
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Produtos do mesmo fornecedor</h2>
			</div>
		</div>
		<div class="produtos_fornecedor col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
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

							<a href=pagina_do_produto.php?id=<?= $id ?> >
								<img class="largura" src=<?= $imagem ?> height='10' width='50'>  
							</a>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Produtos da mesma categoria</h2>
			</div>
		</div>

		<div class="produtos_fornecedor col-md-10 sol-sm-10 col-md-offset-1 col-sm-offset-1">
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
							<a href=pagina_do_produto.php?id=<?= $id ?> >
								<img class="largura" src=<?= $imagem ?> height='10' width='30'>  
							</a> 
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


	<script>
		var customLabel = {
			restaurant: {
				label: 'R'
			},
			bar: {
				label: 'B'
			}
		};

		<?php 
		$longitude =  floatval($row["USER_LONGITUDE"]);
		$latitude = floatval($row["USER_LATITUDE"]);
		?>

		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				center: new google.maps.LatLng(<?= $latitude ?>,<?= $longitude  ?>),
				zoom: 10
			});
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(map);

			var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl("resultado2.php?id=<?= $row['PRO_USER_ID'] ?>", function(data) {
          	var xml = data.responseXML;
          	var markers = xml.documentElement.getElementsByTagName('marker');
          	Array.prototype.forEach.call(markers, function(markerElem) {
          		var name = markerElem.getAttribute('name');
          		var address = markerElem.getAttribute('address');
          		var type = markerElem.getAttribute('type');
          		var point = new google.maps.LatLng(
          			parseFloat(markerElem.getAttribute('lat')),
          			parseFloat(markerElem.getAttribute('lng')));

          		var infowincontent = document.createElement('div');
          		var strong = document.createElement('strong');
          		strong.textContent = name
          		infowincontent.appendChild(strong);
          		infowincontent.appendChild(document.createElement('br'));

          		var text = document.createElement('text');
          		text.textContent = address
          		infowincontent.appendChild(text);
          		var icon = customLabel[type] || {};
          		var marker = new google.maps.Marker({
          			map: map,
          			animation: google.maps.Animation.DROP,
          			position: point,
          			label: icon.label
          		});
          		marker.addListener('click', function() {
          			infoWindow.setContent(infowincontent);
          			infoWindow.open(map, marker);
          		});
          	});
          });
      }

      function toggleBounce() {
      	if (marker.getAnimation() !== null) {
      		marker.setAnimation(null);
      	} else {
      		marker.setAnimation(google.maps.Animation.BOUNCE);
      	}
      }

      function downloadUrl(url, callback) {
      	var request = window.ActiveXObject ?
      	new ActiveXObject('Microsoft.XMLHTTP') :
      	new XMLHttpRequest;

      	request.onreadystatechange = function() {
      		if (request.readyState == 4) {
      			request.onreadystatechange = doNothing;
      			callback(request, request.status);
      		}
      	};

      	request.open('GET', url, true);
      	request.send(null);
      }

      function doNothing() {}
  </script>

  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-xE7a7Pi92cA69kmk-zwtGg5M9l0N2Ag&callback=initMap">
</script>



</body>
</html>