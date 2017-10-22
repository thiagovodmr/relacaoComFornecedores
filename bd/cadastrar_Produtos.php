<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>JCrop - Crop fixo</title>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="css/exemplo.css" type="text/css" />
		<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
	</head>
	<body>
		
		<h1>Recorte a imagem</h1>
		
		<?php

		session_start();
		$dbname = "id2846308_projeto1";
		$usuario="id2846308_pep1";
		$senha = "@lunoifpe";
		try {
		  	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}



			// memory limit (nem todo server aceita)
			ini_set("memory_limit","50M");
			set_time_limit(0);
			
			// processa arquivo
			$imagem		= ( isset( $_FILES['imagem'] ) && is_array( $_FILES['imagem'] ) ) ? $_FILES['imagem'] : NULL;
			$tem_crop	= false;
			$img		= '';
			$nome = sha1(microtime());
			$ext = substr($imagem["name"], -4);
			$dir = "../uploads/".$nome.$ext;


			$nome = $_SESSION['nome'];
			$login = $_SESSION['login'];
			$titulo = $_POST["titulo"];
			$preco = $_POST["preco"];
			$descricao = $_POST["descricao"];
			$image = $dir;
			$categoria = $_POST["categoria"];

			$sql = "INSERT INTO produtos(PRO_TITULO,PRO_PRECO,PRO_DESCRICAO,PRO_CATEGORIA,PRO_ARQUIVO,PRO_LOGIN,PRO_NOME) 
				VALUES(:titulo, :preco, :descricao, :categoria, :imagem, :login, :nome)";	
			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':titulo', $titulo );
			$stmt->bindParam( ':preco', $preco );
			$stmt->bindParam( ':descricao',$descricao );
			$stmt->bindParam( ':categoria', $categoria );
			$stmt->bindParam( ':imagem', $image );
			$stmt->bindParam( ':login', $login );
			$stmt->bindParam( ':nome', $nome );
			$result = $stmt->execute();

			if ( ! $result ){
			    var_dump( $stmt->errorInfo() );
			    exit;
			}





			// valida a imagem enviada
			if( $imagem['tmp_name'] )
			{
				// armazena dimensões da imagem
				$imagesize = getimagesize( $imagem['tmp_name'] );
				
				if( $imagesize !== false )
				{
					// move a imagem para o servidor
					if( move_uploaded_file( $imagem['tmp_name'], $dir ) )
					{
						include( 'm2brimagem.class.php' );
						$oImg = new m2brimagem( $dir );
						// valida via m2brimagem
						if( $oImg->valida() == 'OK' )
						{
							// redimensiona (opcional, só pra evitar imagens muito grandes)
							$oImg->redimensiona( '500',"", '' );
							// grava nova imagem
							$oImg->grava( $dir );
							// novas dimensões da imagem
							$imagesize 	= getimagesize( $dir );
							$img		= '<img src="'.$dir.'" id="jcrop" '.$imagesize[3].' />';
							$preview	= '<img src="'.$dir.'" id="preview" '.$imagesize[3].' />';
							$tem_crop 	= true;	
						}
					}
				}
			}
		?>
		
		<?php if( $tem_crop === true ): ?>
			<h2 id="tit-jcrop">Pra manter o padrão do nosso site</h2>
			<div id="div-jcrop">
				
				<div id="div-preview">
					<?php echo $preview; ?>
				</div>
				
				<?php echo $img; ?>
				
				<input type="button" value="Salvar" id="btn-crop" />
			</div>
			<div id="debug">
				<p><strong>X</strong> <input type="text" id="x" size="5" disabled /> x <input type="text" id="x2" size="5" disabled /> </p>
				<p><strong>Y</strong> <input type="text" id="y" size="5" disabled /> x <input type="text" id="y2" size="5" disabled /> </p>
				<p><strong>Dimensões</strong> <input type="text" id="h" size="5" disabled /> x <input type="text" id="w" size="5" disabled /></p>
			</div>
			<script type="text/javascript">
				var img = '<?php echo $dir; ?>';
			
				$(function(){
					$('#jcrop').Jcrop({
						onChange: exibePreview,
						onSelect: exibePreview,
						minSize		: [ 300, 200 ],
						maxSize		: [ 300, 200 ],
						allowResize	: false,
						addClass	: 'custom'
					});
					$('#btn-crop').click(function(){
						$.post( 'crop.php', {
							img:img, 
							x: $('#x').val(), 
							y: $('#y').val(), 
							w: $('#w').val(), 
							h: $('#h').val()
						}, function(){
							$('#div-jcrop').html( '<img src="' + img + '?' + Math.random() + '" width="'+$('#w').val()+'" height="'+$('#h').val()+'" />' );
							$('#debug').hide();
							$('#tit-jcrop').html(
								'Feito!<br /><a href="../usuario.php"><button>volte para serviços</button</a>');
						});
						return false;
					});
				});
				
				function exibePreview(c)
				{
					var rx = 100 / c.w;
					var ry = 100 / c.h;
				
					$('#preview').css({
						width: Math.round(rx * <?php echo $imagesize[0]; ?>) + 'px',
						height: Math.round(ry * <?php echo $imagesize[1]; ?>) + 'px',
						marginLeft: '-' + Math.round(rx * c.x) + 'px',
						marginTop: '-' + Math.round(ry * c.y) + 'px'
					});
					
					$('#x').val(c.x);
					$('#y').val(c.y);
					$('#x2').val(c.x2);
					$('#y2').val(c.y2);
					$('#w').val(c.w);
					$('#h').val(c.h);
					
				};
			</script>

		<?php endif; ?>
		
	</body>
</html>