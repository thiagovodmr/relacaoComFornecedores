<?php
if (isset($_GET['id']) || isset($id)) {

	$sql3 = "SELECT * FROM mensagens WHERE MEN_REMETENTE = '$perfilId' and MEN_DESTINATARIO = '$id'";
	$resultado3 = mysqli_query($strcon, $sql3) or die('Erro ao tentar cadastrar registro');

		while($registro3 = mysqli_fetch_array($resultado3)){
				$mensagemEnviadas = $registro3['MEN_CONTEUDO'];
				$ordemEnviados = $registro3['MEN_CODIGO'];
				$horarioEnviado = $registro3['MEN_HORARIO'];

				$explode = explode(" ", $horarioEnviado);
				$horario = date('H:i:s', strtotime($explode[1]));
				echo "<div class='container darker'>
			  	<p>$mensagemParaMim</p>
			 	<span class='time-right'>$horario</span>
				</div>";
		}
}
?>