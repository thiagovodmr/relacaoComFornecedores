<?php 

session_start();
include_once "bd/conexao.php"; 

$perfilId = $_SESSION["perfil"];
$id = $_GET["id"];

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