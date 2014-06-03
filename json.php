<?php
//header('Content-type: application/json');
	if(!isset($_SESSION))
		session_start();

	require_once("inc/mysql.php");

	if (isset($_SESSION['usuario']['autenticado']) && $_SESSION['usuario']['autenticado']) {

		$sSQL	= 	"SELECT u.* "
				.	"FROM usuarios u "
				.	"ORDER BY u.paterno, u.materno, u.nombres ";

		if ($oUsuario	=	mysqli($sSQL)) {
			$ok = TRUE;
		}else{
			$ok = FALSE;
			$_SESSION['mensaje'] = "Error al consultar usuarios";
		}
	}else{
		header("Location:acceso.php");
	}


	$oResponse = array();
	$oTemporal = array();
	if ($ok) {
		while ($aUsuario = $oUsuario->fetch_assoc()) {
			$aTemporal[] = $aUsuario;
		}

		$oResponse['usuarios'] = $aTemporal;

	}else{
	}

	echo json_encode($oResponse);
?>

