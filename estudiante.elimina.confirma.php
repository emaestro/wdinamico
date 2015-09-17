<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	require_once("inc/mysql.php");

	if (isset($_SESSION['usuario']['autenticado']) && $_SESSION['usuario']['autenticado']) {
	}else{
		header("Location:acceso.php");
	}

	$sSQL	= 	"DELETE FROM usuarios "
			.	"WHERE usuario_id = {$_GET['id']} ";
	if ($oUsuario = mysqli($sSQL)) {
		header("Location:listado.php");
	}
	

?>