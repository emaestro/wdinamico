<?php
	require("cabecera.php");

	if (isset($_SESSION['usuario']['autenticado']) && $_SESSION['usuario']['autenticado']) {
	}else{
		header("Location:acceso.php");
	}

	require("menu.php");
?>

	<div class="container">

		<div class="row">
			<div class="col-md-12">

				<h3>Registro de Nuevo Usuario</h3>

				<form class="form-horizontal" method='post' name='fregistro' id='fregistro' action='nuevo-verifica.php' role='form'>

					<div class="form-group">
						<label for="txt-paterno" class="col-sm-2 control-label">Paterno :</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="txt-paterno" name="txt-paterno"  placeholder="Apellido Paterno" maxlength="25" autofocus>
						</div>
					</div>

					<div class="form-group">
						<label for="txt-materno" class="col-sm-2 control-label">Materno :</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="txt-materno" name="txt-materno" placeholder="Apellido Materno" maxlength="25">
						</div>
					</div>

					<div class="form-group">
						<label for="txt-nombres" class="col-sm-2 control-label">Nombres :</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="txt-nombres" name="txt-nombres" placeholder="Nombres" maxlength="35">
						</div>
					</div>

					<div class="form-group">
						<label for="txt-usuario" class="col-sm-2 control-label">Usuario :</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="txt-usuario" name="txt-usuario" placeholder="Usuario" maxlength="26">
						</div>
					</div>

					<div class="form-group">
						<label for="txt-clave" class="col-sm-2 control-label">Clave :</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="txt-clave" name="txt-clave"  placeholder="Clave" maxlength="16">
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-6 ">
							<button type="submit" class="btn btn-primary">Aceptar</button>
						</div>
					</div>


				</form>

				
			</div>
		</div>

	</div>

<?php
	require("pie.php");
?>

