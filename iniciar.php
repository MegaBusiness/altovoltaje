<?php 
	$pass = "alto";
	$user = "megavip";
	$u = strtolower($_POST['u']);
	$c = strtolower($_POST['c']);

	if (isset($_POST['iniciar'])) {

		
		if($u == $user) {

			if ($c == $pass) {
				header("Location: galery.php");
			} else {
				header("Location: index.php");
			}
			
		} else {
			header("Location: index.php");
		}
		
	} else {
		echo '<div style="margin:3%; background-color:crimson; color:#fff;">Debe registrarse para obtener los datos de acceso</div>';
		header("refresh:4 log.php");
	}
	
?>