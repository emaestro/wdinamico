<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	require_once("inc/mysql.php");

	if (isset($_SESSION['usuario']['autenticado']) && $_SESSION['usuario']['autenticado']) {
		$paterno = $_POST['txt-paterno'];
		$materno = $_POST['txt-materno'];
		$nombres = $_POST['txt-nombres'];
		$usuario = $_POST['txt-usuario'];
		$clave = $_POST['txt-clave'];

		$sSQL	= 	"INSERT INTO usuarios SET "
				.	"paterno = '{$paterno}', "
				.	"materno = '{$materno}', "
				.	"nombres = '{$nombres}', "
				.	"usuario = '{$usuario}', "
				.	"clave = '{$clave}' ";
		//echo $sSQL;
		if ($oUsuario	=	mysqli($sSQL)) {
			$_SESSION['mensaje'] = "Usuario guardado correctamente";
			header("Location:nuevo.php");
		}else{
			$_SESSION['mensaje'] = "Error el insertar usuario";
			header("Location:nuevo.php");
		}
	}else{
		header("Location:error.php");
	}

?>