<?php
	if ($_SESSION['tipo_sesion'] >=3 || $_SESSION['tipo_sesion'] <=1 ) {
		echo $loginControl->forzarCierreSesion();
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> PROYECTOS <small>Listado de proyectos</small></h1>
	</div>
	<p class="lead">Proyectos registrados</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROYECTOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>proyecto/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROYECTO
	  		</a>
	  	</li>
	  	<!--li>
	  		<a href="<?php echo SERVERURL; ?>adminsearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROYECTO
	  		</a>
	  	</li-->
	</ul>
</div>

<?php

	require_once "./controladores/ProyectoControlador.php";

	$instanciaProyecto = new proyectoControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Proyectos</h3>
		</div>

		
		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaProyecto->paginarProyectosControlador($pagina[1], 1, $_SESSION['codigo_cuenta_sesion'], "");
			?>
			
		</div>
	</div>
</div>