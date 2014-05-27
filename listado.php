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
			<div class="col-md-offset-4 col-md-4">

				<div class="alert alert-info">
					<p>Bienvenido al sitio seguro</p>
					<?php
						echo $_SESSION['usuario']['usuario'];
					?>
				</div>
				
			</div>
		</div>

	</div>

<?php
	require("pie.php");
?>

