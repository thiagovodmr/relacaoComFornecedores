<?php
	session_start();
	include 'bd/conexao.php';

		$perfilId = $_SESSION['perfil'];

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