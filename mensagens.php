<?php
include 'cabecalho.php';
include 'bd/conexao.php';
include 'security.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mensagens</title>
	<style>
	.container {
	    width: 99%;
	    border: 2px solid #dedede;
	    background-color: #ffffff;
	    border-radius: 5px;
	    padding: 10px;
	    margin: 10px 0;
	}

	.darker {
	    border-color: #ccc;
	    background-color: #B0C4DE;
	}

	.container::after {
	    content: "";
	    clear: both;
	    display: table;
	}

	.container img {
	    float: left;
	    max-width: 60px;
	    margin-right: 20px;
	    border-radius: 50%;
	}

	.container img.right {
	    float: right;
	    margin-left: 20px;
	    margin-right:0;
	}

	.time-right {
	    float: right;
	    color: #aaa;
	}

	.time-left {
	    float: left;
	    color: #999;
	}
	#menssage{
		font-size: 20px;
		overflow: auto;
		margin-left: 10px;
		height: 450px;
	}
	.list-group-item{
		border: 1px solid black;
	}
	form{
	    background-repeat: no-repeat;
   	 	background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
   		background-size: cover;
		border: 3px solid black;
		height: 80%;
		font-size: 2em;
	}
	.container-fluid{
		/*margin-top: 50px;*/
	}
	fieldset{
		margin-top: 50px;
	}
	input[type=submit]{
		background-color: #90EE90;
		border-radius: 10px;
		width: 100%;
	}
	input[type=text]{
		border-radius: 20px;
		width: 100%;
	}
	textarea{
		border-radius: 20px;
		width: 100%;	
	}
	#recebido{
		margin-left: 800px;
	}
	#enviados{
		background-color: green;
	}
	.scrollbar-morpheus-den::-webkit-scrollbar-track {
	  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
	  background-color: #F5F5F5;
	  border-radius: 10px; }

	.scrollbar-morpheus-den::-webkit-scrollbar {
	  width: 13px;
	  background-color: #F5F5F5; }

	.scrollbar-morpheus-den::-webkit-scrollbar-thumb {
	  border-radius: 10px;
	  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
	  background-image: -webkit-gradient(linear, left bottom, left top, from(#30cfd0), to(#330867));
	  background-image: -webkit-linear-gradient(bottom, #30cfd0 0%, #330867 100%);
	  background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%); }
    .table-tb{
    	text-align: center;
    	font-size: 40px;
   		margin: 5px;
    }
    .text-a{    	
    	text-decoration: none;
    }
    .td{
    	padding: 5px;
    }
    #nome_inter{
    	color: white;
    	font-size: 40px;
    }
    .editmensagem{
    	font-size: 25px;
    }
    #m{
    	padding-bottom: 20px;
    }
    .badge-pill{
        font-size:20px;
        float: right;
    }
    
	</style>
</head>
</head>
<body>
<?php
	$perfilId = $_SESSION['perfil'];

	if(!isset($_GET['id'])){
		$_GET['id'] = [];	
	}
	if(!isset($_SESSION['dest'])){
		$_SESSION['dest'] = [];	
	}
	$id = $_GET['id'];
	$_SESSION['dest'] = $_GET['id'];
?>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-sm-4">	
			<ul class="list-group">
				<table id="menssages_nao_lidas" border="1" width="100%" class="table-tb">
					
	<?php
		$sql = "SELECT * FROM usuarios";
		$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
		

  			
		while($registro = mysqli_fetch_array($resultado)){
  			$nome_interprise = $registro['USER_EMPRESA'];
  			$identificador = $registro['USER_PERFIL'];
  			
			$query = "SELECT * FROM mensagens WHERE MEN_REMETENTE = '$identificador' AND MEN_DESTINATARIO = '$perfilId' AND 
	  			MEN_LIDA = 0";
  			
  			$q = mysqli_query($strcon, $query);
  			$quant = mysqli_num_rows($q);
  			

           echo "<tr>
			 		<td class='td'>
			            <a class='text-a' href=mensagens.php?id=".$identificador.">".$nome_interprise."</a>
			            <span class='badge badge-success badge-pill' style='background-color: green;'>". $quant."</span>
			        </td>
			     </tr>";
  		}
	?>
				</table>
				
			</ul>
		</div>

		<div id="m" class="col-md-8 col-md-offset-1 col-sm-6 col-sm-offset-1">	
			<form action="bd/salvar_mensagem.php" method="POST">
				
				<fieldset>
					<div class="row">
						<div class="form-group col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
						 	<?php
						 		if(isset($_GET['id'])){
									$sql1 = "SELECT * FROM usuarios WHERE USER_PERFIL = '$id'";
									$resultado1 = mysqli_query($strcon, $sql1) or die('Erro ao tentar cadastrar registro');
									while($registro1 = mysqli_fetch_array($resultado1)){
  										$nome_empresa = $registro1['USER_EMPRESA'];
						 				echo "<label for='exampleInputEmail1' id='nome_inter'>$nome_empresa</label>";
						 			}
						 		}
						 	?>
						</div>
					</div>
					<div id="menssage" class="scrollbar scrollbar-morpheus-den">
						<?php
						if (isset($_GET['id']) || isset($id)) {
							$sql2 = "SELECT * FROM mensagens WHERE (MEN_REMETENTE = '$id' and MEN_DESTINATARIO = '$perfilId') or (MEN_REMETENTE = '$perfilId' and MEN_DESTINATARIO = '$id')";
							$resultado2 = mysqli_query($strcon, $sql2) or die('Erro ao tentar cadastrar registro');


							$update = "UPDATE mensagens SET MEN_LIDA = 1
							WHERE MEN_REMETENTE = '$id' and MEN_DESTINATARIO = '$perfilId'";
							$updateQuery = mysqli_query($strcon,$update) or die('Erro');

						while($registro2 = mysqli_fetch_array($resultado2)){
							if($registro2['MEN_REMETENTE'] == $id && $registro2['MEN_DESTINATARIO'] == $perfilId){
									

									$mensagemParaMim = $registro2['MEN_CONTEUDO'];
				  					$datetime = $registro2['MEN_HORARIO'];
				  					$explode = explode(" ", $datetime);
				  					$horario = date('H:i:s', strtotime($explode[1]));
				  					echo "<div class='container'>
								  	<p class='editmensagem'>$mensagemParaMim</p>
								 	<span class='time-right'>$horario</span>
									</div>";
							}
							else{
									$mensagemParaMim = $registro2['MEN_CONTEUDO'];
				  					$datetime = $registro2['MEN_HORARIO'];
				  					$explode = explode(" ", $datetime);
				  					$horario = date('H:i:s', strtotime($explode[1]));
				  					echo "<div class='container darker'>
								  	<p class='editmensagem'>$mensagemParaMim</p>
								 	<span class='time-left'>$horario</span>";

								 	if($registro2["MEN_LIDA"]==0){
								 		echo "<span class='pull-right'>
								 		<i class='fa fa-envelope-o' aria-hidden='true'></i>
								 		</span>";
								 	}else{
								 		echo "<span class='pull-right'>
								 		<i class='fa fa-envelope-open-o' aria-hidden='true'></i>
								 		</span>";
								 	}

									echo "</div>";
								}
							}
						}
						?>
					</div>
					<?php
					if($_GET['id'] == []){
						echo "<h1>Negocie com alguem!</h1>";
					}
					else{
					?>

					<div class="row">
						<div class="form-group col-md-10 col-md-offset-1  col-sm-10 col-sm-offset-1">
							<label for="exampleFormControlTextarea1"></label>
							<textarea class="form-group" rows="3" name="conteudo" placeholder=" Digite sua mensagem" required oninvalid="this.setCustomValidity(\'Campo requerido\')"></textarea>
						</div>
						<div class="form-group col-md-10 col-md-offset-1">
							<input type="submit" value="Enviar">
							
						</div>
					</div>
					<?php } ?>
				</fieldset>

			</form>
		</div>
	</div>
	</div>
	<script>
		 setInterval(function(){
		 	$.get("men.php?id=<?= $id ?>",function(data){
  		  	$('#menssage').html(data);
				
		 	});
		 }, 1000);
		 
		 setInterval(function(){$.get("mens_nao_lidas.php",function(data){
		 	$('#menssages_nao_lidas').html(data);
		 });
		},500);
		
		$("#menssage").animate({ scrollTop: $("#menssage")[0].scrollHeight}, 1000);
		$(document).ready(function() {
			var elements = document.getElementsByTagName("INPUT");
			for (var i = 0; i < elements.length; i++) {
				elements[i].oninvalid = function(e) {
			   		e.target.setCustomValidity("");
		    		if (!e.target.validity.valid) {
		        		e.target.setCustomValidity("Não consegue né, Moises?");
		   			}
				};
				elements[i].oninput = function(e) {
		    		e.target.setCustomValidity("");
				};
			}
		})
	</script>
</body>
</html>