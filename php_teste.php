<html>
	<head>
		<title>Teste do Ricardo</title>
	</head>
	<body>
		<?php
			$endereco = '';
			$resultado = '';
			$estado = 'Nenhum endere&ccedil;o enviado at&eacute; o momento!';

			if( isset( $_POST["processar"]))
			{
				$endereco = trim( $_POST[ 'endereco']);

				if( strlen( $endereco) > 0 )
				{
					require_once( 'php_parser.php');
					$parser = new JacknpoeParserEndereco();
					$parser->reconhecerEndereco( $endereco);

					$resultado = 'Resultado: <br><br>' . 
						'<b>Logradouro:</b> ' . htmlentities( $parser->logradouro,  ENT_QUOTES | ENT_HTML401,  "ISO-8859-1") . '<br>' . 
						'<b>N&uacute;mero:</b> ' . htmlentities( $parser->numero,  ENT_COMPAT | ENT_HTML401,   "ISO-8859-1") . '<br>' . 
						'<b>Complemento:</b> ' . htmlentities( $parser->complemento, ENT_QUOTES | ENT_HTML401, "ISO-8859-1") . '<br>';
					$estado = 'Endere&ccedil;o enviado e processado.';
				}
				else
				{
					$estado = 'O endere&ccedil;o enviado est&aacute; vazio!';
				}
			}
		?>
		<br><?php echo $estado ?><br><br>

		<form action="php_teste.php" method="POST" style="border: 0px">
			Endere&ccedil;o: <input type="text" name="endereco" size="80" value="<?php echo $endereco; ?>"><br><br>
			<input type="submit" name="processar" value="Processar">
		</form>

		<br><?php echo $resultado ?><br><br>
	</body>
</html>
