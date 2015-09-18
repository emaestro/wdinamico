<?php
	require("cabecera.php");
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

	require("menu.php");

?>

	<div class="container">

		<div class="row">
			<div class="col-md-12">

<?php
				if ($ok) {
?>
					<h3>Listado de usuarios</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Apellidos y Nombres</th>
								<th>Usuario</th>
								<th>Operaciones</th>
							</tr>				
						</thead>
						<tbody>
<?php
							$_SESSION['oPDF'] = array();
							while ($aUsuario = $oUsuario->fetch_assoc()) {
								$_SESSION['oPDF'][] = $aUsuario;
?>
								<tr>
									<td><?php echo $aUsuario['paterno']," ",$aUsuario['materno']," ",$aUsuario['nombres'];?></td>
									<td><?php echo $aUsuario['usuario'];?></td>
									<td>
										<a href="estudiante.modifica.formulario.php?id=<?php echo $aUsuario['usuario_id'];?>"><span class="glyphicon glyphicon-edit"></span></a> 
										<a href="estudiante.elimina.confirma.php?id=<?php echo $aUsuario['usuario_id'];?>"><span class="glyphicon glyphicon-remove-sign"></span></a>

									</td>
								</tr>
<?php
							}
?>				
						</tbody>
						<tfoot>
					
						</tfoot>
					</table>

					<div class="btn-group" role="group" aria-label="...">
						<a href="listado.imprimir.php" class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Lista</a>
						<a href=""class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Exportar a Excel</a>
						<a href=""class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Exportar a CSV</a>
					</div>	  

<?php
				}else{
?>
					<div class="alert alert-error">
						<?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']);?>
						
					</div>
<?php
				}
?>
				
			</div>
		</div>

	</div>

<?php
	require("pie.php");
?>

