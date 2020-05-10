<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>


<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-male-female"></i> MI EQUIPO</small></h1>
	</div>
	<p class="lead">Datos del equipo</p>
</div>



<?php  

if ($_SESSION['codigo_equipo_sesion'] == 0) {
?>
	<div class="container-fluid">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h1>Sin equipo</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<p>Aun no hay un Equipo asignado. Consultar con el docente</p>
			</div>
		</div>
		
	</div>	

<?php
}
else
{
	
	require "./controladores/estudianteControlador.php";
	$estudianteControl = new estudianteControlador();

	$todoMiEquipo = $estudianteControl->cargarTodoMiEquipoControlador($_SESSION['codigo_equipo_sesion']);

?>

	<!-- Panel mi cuenta -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1 align="center">"<?php echo $todoMiEquipo['equipo'];?>"</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<h3>Integrantes del equipo </h3>
				<br>
				<table class="table table-striped table-hover ">
					<thead>
					<tr>
						<th>Nombre completo</th>
						<th>Correo electronico</th>
						<th>Telefono</th>
					</tr>
					</thead>
					<tbody>
						<?php 
							$datosIntegrantes = $todoMiEquipo['integrantes']->fetchAll();
							
							foreach ($datosIntegrantes as $integrante)
							{
								echo 
								'<tr>
									<td>'.$integrante['PersonaNombre'].' '.$integrante['PersonaApellido'].'</td>
									<td>'.$integrante['CuentaEmail'].'</td>
									<td>'.$integrante['PersonaTelefono'].'</td>
								</tr>';
								
							}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<br>



	
<?php
}
?>
