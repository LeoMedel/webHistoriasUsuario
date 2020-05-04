<?php
	if ($_SESSION['tipo_sesion'] >=3 || $_SESSION['tipo_sesion'] <=1 ) {
		echo $loginControl->forzarCierreSesion();
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>PROYECTO Y SU EQUIPO <small>Asignacion del Proyecto al Equipo</small></h1>
	</div>
	<p class="lead">Equipos registrados</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectoEquipolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PORYECTOS CON EQUIPOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>proyectoEquipo/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ASIGNACION PROYECTO-EQUIPO
	  		</a>
	  	</li>
	  	<!--li>
	  		<a href="<?php echo SERVERURL; ?>equipoEstudiantes/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; AGREGAR ESTUDIANTE AL EQUIPO
	  		</a>
	  	</li-->
	</ul>
</div>

<?php

	require_once "./controladores/proyectoControlador.php";

	$instanciaProyecto = new proyectoControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Equipos</h3>
		</div>

		
		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaProyecto->paginarProyectosEquiposControlador($pagina[1], 5, $_SESSION['codigo_cuenta_sesion'], "");
			?>
			
		</div>
	</div>
</div>