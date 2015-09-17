<?php
	require_once("inc/mysql.php");

	if (isset($_SESSION['usuario']['autenticado']) && $_SESSION['usuario']['autenticado']) {
	}else{
		header("Location:acceso.php");
	}

	$sSQL	= 	"UPDATE usuarios SET "
			.	"paterno = '{$_POST['txt-paterno']}', "
			.	"materno = '{$_POST['txt-materno']}', "
			.	"nombres = '{$_POST['txt-nombres']}', "
			.	"usuario = '{$_POST['txt-usuario']}', "
			.	"clave = '{$_POST['txt-clave']}', "
			.	"WHERE usuario_id = {$_post['txt-id']} ";

	if ($oUsuario = mysqli($sSQL)) {
		header("Location:listado.php")
	}
	

?>