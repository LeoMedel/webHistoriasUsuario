<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>


<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-folder-star"></i> MI PROYECTO</small></h1>
	</div>
	<p class="lead">Datos del Proyecto</p>
</div>



<?php  

if ($_SESSION['codigo_proyecto_sesion'] == 0) {
?>
	<div class="container-fluid">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h1>Sin proyecto</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<p>Aun no hay un Proyecto asignado al equipo. Consultar con el docente</p>
			</div>
		</div>
		
	</div>	

<?php
}
else
{
	
	require "./controladores/estudianteControlador.php";
	$estudianteControl = new estudianteControlador();

	$todoMiProyecto = $estudianteControl->cargarTodoMiProyectoControlador($_SESSION['codigo_proyecto_sesion']);
	

?>

	<!-- Panel mi cuenta -->
	<div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h1><?php echo $todoMiProyecto['titulo'];  ?></h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<h3>Fechas del proyecto:</h3>
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
						<th>INICIO</th>
						<th>FIN</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><p><?php echo $todoMiProyecto['fecha_inicio'];  ?></p></td>
							<td><p><?php echo $todoMiProyecto['fecha_fin'];  ?></p></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<br>

	<!-- Panel mi cuenta -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1>Metodología </h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<h3>Metodología asignada al proyecto:</h3>
				<br>
				<h3>"<?php echo $todoMiProyecto['metodologia'];  ?>"</h3>
				<br>
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
						<th>OBJETIVO</th>
						<th>DESCRIPCION</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><p><?php echo $todoMiProyecto['objetivoMet'];  ?></p></td>
							<td><p><?php echo $todoMiProyecto['descripcionMet'];  ?></p></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
}
?>
