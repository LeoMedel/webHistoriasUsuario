<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> EQUIPOS <small>Listado de Equipos</small></h1>
	</div>
	<p class="lead">Equipos registrados</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>equipolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>equipo/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EQUIPO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>equipoEstudiantes/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; AGREGAR ESTUDIANTE AL EQUIPO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>equipoEstudianteslist/" class="btn btn-primary">
	  			<i class="zmdi zmdi-male-female"></i> &nbsp; VER INTEGRANTES DE LOS EQUIPOS
	  		</a>
	  	</li>
	</ul>
</div>

<?php

	require_once "./controladores/equipoControlador.php";

	$instanciaEquipo = new equipoControlador();

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

				echo $instanciaEquipo->paginarEquiposControlador($pagina[1], 6, $_SESSION['codigo_cuenta_sesion'], "");
			?>
			
		</div>
	</div>
</div>