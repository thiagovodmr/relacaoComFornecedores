<?php 
	include "cabecalho.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<style>

		#Layer1{
			margin-left: 4px;
			margin-bottom: 5px;
			top: 100%;
			left: 100%;
			bottom: 100%;
		}
		h1{
			margin-left: 40px;
		}
		#borda{
			float: left;
			border:3px solid black;
			height: 630px;
			width: 230px;
			margin-top: 20px;
			margin-left: 20px;

		}
		#imagens{
			margin-right: 300px;
			margin-top: 70px; 
			float: right;
			border: 1px solid black;
			width: 800px;
			height: 500px;
		}
		input[type=text]{
			margin-top: 20px;
			margin-left:700px;
		}

	</style>
</head>
<body>
	<div id="borda">
		<h1>Produtos</h1>
		<div id="Layer1">
			<table border="1px solid black">
				<tr>
					<td>Adesivos</td>
				</tr>
				<tr>
					<td>Apontador</td>
				</tr>
				<tr>
					<td>Cadernos, Blocos e Agendas</td>
				</tr>
			</table>
		</div>


	</div>
	
	<input type="text" name="pesquisa" placeholder="pesquisar"><input type="submit" value="Buscar">
	<div id="imagens">
		
		<img id="muda" src="imagens/img2.jpg" width="800px" height="500px">
	</div>


	<script>
		var img2 = true;
		var img3 = false;
		
		 setInterval(function mudar(){
			if(img2){
				document.getElementById('muda').src="imagens/img3.jpg";
				img2=false;
				img3=true;
				

			}else if(img3){
				document.getElementById("muda").src="imagens/img2.jpg";
				img3=false;
				img2=true;
			}

		},1000*6);
	
	</script>

</body>
</html>