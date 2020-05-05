<?php
    if ($_SESSION['tipo_sesion'] != 3) {

        echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    }
?>


<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>MI PROYECTO</small></h1>
	</div>
	<p class="lead">Datos del Proyecto</p>
</div>



<?php  

if ($_SESSION['codigo_proyecto_sesion'] == 0) {
?>
	<div class="container-fluid">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h1>ERROR</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<p>Aun no hay un Proyecto asignado</p>
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
				<h3>Inicio: </h3>
				<p><?php echo $todoMiProyecto['fecha_inicio'];  ?></p>
				<h3>Fin: </h3>
				<p><?php echo $todoMiProyecto['fecha_fin'];  ?></p>
			</div>
		</div>
	</div>

	<br>

	<!-- Panel mi cuenta -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1>Metodología: "<?php echo $todoMiProyecto['metodologia'];  ?>"</h1>
				<!--h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Información</h3-->
			</div>
			<div class="panel-body">
				<h3>Objetivo </h3>
				<p><?php echo $todoMiProyecto['objetivoMet'];  ?></p>
				<h4>Descripcion: </h4>
				<p><?php echo $todoMiProyecto['descripcionMet'];  ?></p>
			</div>
		</div>
	</div>

	<br>

<?php
}
?>
