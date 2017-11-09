<?php
if (isset($_GET['id']) || isset($id)) {

	$sql2 = "SELECT * FROM mensagens WHERE MEN_REMETENTE = '$id' and MEN_DESTINATARIO = '$perfilId'";
	$resultado2 = mysqli_query($strcon, $sql2) or die('Erro ao tentar cadastrar registro');

	while($registro2 = mysqli_fetch_array($resultado2)){
		$mensagemParaMim = $registro2['MEN_CONTEUDO'];
		$ordemRecebido = $registro2['MEN_CODIGO'];
		$horarioRecebido = $registro2['MEN_HORARIO'];

		$explode1 = explode(" ", $horarioRecebido);
		$horario = date('H:i:s', strtotime($explode1[1]));
		echo "<div class='container darker'>
  		<p>$mensagemParaMim</p>
 		<span class='time-right'>$horario</span>
		</div>";	
	}
}
?>