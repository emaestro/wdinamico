<?php

	require_once("inc/mysql.php");

	$usuario = $_POST['txt-usuario'];
	$clave = $_POST['txt-clave'];
	$boton = $_POST['btn-aceptar'];

	/*
	echo $usuario;
	echo $clave;
	echo $boton;
	*/
	
	//$sConsulta	=	"SELECT NOW() as fechita";
	//$oFecha	=	mysqli($sConsulta);

	//$aFecha = $oFecha->fetch_assoc();
	//print_r($aFecha);

	$sConsulta	=	"SELECT u.* "
				.	"FROM usuarios u "
				.	"WHERE u.usuario = '{$usuario}'";
	if ($oUsuario	=	mysqli($sConsulta)) {

		//Almacenamos la cantidad de resultados (rows)
		$nUsuario	=	$oUsuario->num_rows;
		
		//Cuando solo existe un usuario
		if ($nUsuario == 1) {
			$aUsuario = $oUsuario->fetch_assoc();
			if ($aUsuario['clave']==$clave) {
				header("Location:bienvenido.php");
			}
			else
			{
?>
				<div class="alert alert-error">
					<p><strong>Error!!!</strong>Contraseña incorrecta?></p>
				</div>
<?php

			}
		}
		else
		{
?>
			<div class="alert alert-error">
				<p><strong>Error!!!</strong>Existe mas de un usuario para <?=$usuario?></p>
			</div>
<?php
		}
	}else{
?>
		<div class="alert alert-error">
			<p><strong>Error!!!</strong> No fue posible realizar la autenticación</p>
		</div>
<?php
	}


	


?>