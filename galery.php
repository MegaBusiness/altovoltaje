<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Inmuebles Alto Voltaje</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" />
	<link rel="stylesheet" type="text/css" href="lightbox/demo.css" />
	<script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.pack.js"></script>
	<script type="text/javascript" src="lightbox/script.js"></script>
</head>
<body class="gal">
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					
					<div id="heading">
						<h1>INMUEBLES</h1>
					</div>

					<?php
					$directory = 'img/images';

					//Si se quiere subir un archivo
					if (isset($_POST['nuevaimagen'])) {
						$correcto = true;
						$archivo = $_FILES['archivo']['name'];
						if (isset($archivo)) {
							if ($archivo != "") {
								$tipo = $_FILES['archivo']['type'];
								$tamano = $_FILES['archivo']['size'];
								$temp = $_FILES['archivo']['tmp_name'];
								//Se comprueba si el archivo a cargar es correcto
								if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
									echo '<div class="error"><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
									- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
									$correcto = false;
								}
								else {
									//Se comprueba si se guarda correctamente
									if (move_uploaded_file($temp, $directory.'/'.$archivo)) {
										chmod($directory.'/'.$archivo, 0777);
									}
									else {
										echo '<div class="error"><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
										$correcto = false;
									}
								}
							}
						}
						if ($correcto)
							echo '<div class="correcto"><b>La imagen se ha subido correctamente.</b></div>';
						echo '<br>';
					}

					?>

					<div id="gallery">
					<div style="OVERFLOW: auto; HEIGHT: 100%; WIDTH: 90%; padding: 1%;">
					<?php

					$allowed_types=array('jpg','jpeg','gif','png');
					$file_parts=array();
					$ext='';
					$title='';
					$i=0;

					$dir_handle = @opendir($directory) or die("Hay un error con el directorio de imágenes!");

					while ($file = readdir($dir_handle))
					{
						if($file=='.' || $file == '..') continue;

						$file_parts = explode('.',$file);
						$ext = strtolower(array_pop($file_parts));

						$title = implode('.',$file_parts);
						$title = htmlspecialchars($title);

						$nomargin='';

						if(in_array($ext,$allowed_types))
						{
							if(($i+1)%3==0) $nomargin='nomargin';

							echo '
							<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat center/100%;">
							<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
							</div>';

							$i++;
						}
					}

					closedir($dir_handle);

					?>
					</div>
					<div class="clear"></div>
					</div>

				</div>
			</div>
		</div>
	</section>

</body>
</html>