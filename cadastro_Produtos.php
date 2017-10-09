<?php
include 'cabecalho.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/cadastro_produtos.css">
	<title>
		Cadastrar Produtos
	</title>
</head>
<body>
<div class="card card-container">
    <h1>Cadastre seus Produtos</h1>
    <p id="profile-name" class="profile-name-card"></p>
	<form action="bd/cadastrar_Produtos.php" method="POST">
		Selecione a categoria:<select name="categoria" class="selectpicker">
			<option value="adesivos">ADESIVOS</option>
			<option value="apontador">APONTADOR</option>
			<option value="bamp">BLOCOS AUTOADESIVOS E MARCADORES DE PÁGINAS</option>
			<option value="cadernos">CADERNOS, BLOCOS E AGENDAS</option>
			<option value="clips">CLIPS, ALFINETES E ELÁSTICOS</option>
			<option value="colas">COLAS</option>
			<option value="crachas">CRACHÁS</option>
			<option value="embalagens">EMBALAGENS</option>
			<option value="encadernacao">ENCADERNAÇÃO</option>
			<option value="envelopes">ENVELOPES</option>
			<option value="escrita">ESCRITA E CORRETIVO</option>
			<option value="etiquetas">ETIQUETAS</option>
			<option value="ficharios">FICHÁRIOS E ACESSÓRIOS</option>
			<option value="fa">FITAS ADESIVAS</option>
			<option value="formularios">FORMULÁRIOS E IMPRESSOS</option>
			<option value="grampeadores">GRAMPEADORES E GRAMPOS</option>
			<option value="maescolar">MATERIAL ESCOLAR</option>			
			<option value="mde">MATERIAL DE ESCRITÓRIO</option>
			<option value="meel">MOCHILAS ESCOLARES, ESTOJOS E LANCHEIRAS</option>
			<option value="pastas">PASTAS</option>
			<option value="reguas">RÉGUAS E COMPASSO</option>
			<option value="sp">SACOS PLÁSTICOS</option>
			<option value="te">TESOURAS E ESTILETES</option>
			<option value="lc">LIVROS PARA COLORIR</option>
			<option value="tintas">TINTAS</option>
		</select>
		<br>

		Titulo : <input id="inputEmail" class="form-control" type="text" name="titulo"><br>
		Preço : <input id="inputEmail" class="form-control" type="text" name="preco"><br>
		Descrição : <input id="inputEmail" class="form-control" type="text" name="descricao"><br>
		Imagem : <input type="file" name="imagem"><br>
		<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button>

	</form>

</div><!-- /card-container -->
</div>
<div id="espaco">
	
</div>

<?php
include 'rodape.php';
?>
</body>
</html>