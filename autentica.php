<?php

	require_once("inc/mysql.php");

	$usuario = $_POST['txt-usuario'];
	$clave = $_POST['txt-clave'];
	$boton = $_POST['btn-aceptar'];

	echo $usuario;
	echo $clave;
	echo $boton;

	$sConsulta	=	"SELECT NOW() as fechita";
	$oFecha	=	mysqli($sConsulta);

	$aFecha = $oFecha->fetch_assoc();
	print_r($aFecha);

?>