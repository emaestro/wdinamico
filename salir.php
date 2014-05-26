<?php
	if (!isset($_SESSION)) {
		session_start();
	}

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
 if (isset($_SESSION['usuario']['autenticado'])) {
 	unset($_SESSION);
 	header("Location:acceso.php");
 }
?>