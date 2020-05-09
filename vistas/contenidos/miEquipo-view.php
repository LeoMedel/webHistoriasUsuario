<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>


<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>MI EQUIPO</small></h1>
	</div>
	<p class="lead">Datos del equipo</p>
</div>



<?php  

if ($_SESSION['codigo_equipo_sesion'] == 0) {
?>
	<div class="container-fluid">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h1>ERROR</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<p>Aun no hay un Equipo asignado</p>
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
		<div class="panel panel-success">
			<div class="panel-heading">
				<h1>"<?php echo $todoMiEquipo['equipo'];?>"</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<h3>Integrantes del equipo </h3>
				<br>
				<ul>
					<?php 
						$datosIntegrantes = $todoMiEquipo['integrantes']->fetchAll();
						
						foreach ($datosIntegrantes as $integrante)
						{
							echo '<li><h4>'.$integrante['PersonaNombre'].' '.$integrante['PersonaApellido'].' ('.$integrante['CuentaEmail'].')</h4></li> <br>';
						}
					?>
				</ul>
				
			</div>
		</div>
	</div>

	<br>

	
<?php
}
?>
