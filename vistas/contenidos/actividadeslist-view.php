<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> ACTIVIDADES <small>Actividades del proyecto</small></h1>
	</div>
	<p class="lead">Actividades registradas</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>faselist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ACTIVIDADES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>actividad/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ACTIVIDAD
	  		</a>
	  	</li>
	</ul>
</div>

<?php

	require_once "./controladores/actividadControlador.php";

	$instanciaActividad = new actividadControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Actividades</h3>
		</div>

		
		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaActividad->paginarActividadesControlador($pagina[1], 10, $_SESSION['codigo_equipo_sesion'], "");
			?>
			
		</div>
	</div>
</div>