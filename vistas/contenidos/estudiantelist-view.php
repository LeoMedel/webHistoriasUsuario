
<?php
	if ($_SESSION['tipo_sesion'] >=2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>ESTUDIANTES</small></h1>
	</div>
	<p class="lead">Listado de los ESTUDIANTES registrados en el sistema</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>estudiantelist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ESTUDIANTES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>estudiante/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ESTUDIANTE
	  		</a>
	  	</li>
	  	<!--li>
	  		<a href="<?php echo SERVERURL; ?>docentesearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR DOCENTES
	  		</a>
	  	</li-->
	</ul>
</div>

<?php

	require_once "./controladores/estudianteControlador.php";

	$instanciaEstudiante = new estudianteControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;ESTUDIANTES</h3>
		</div>
		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaEstudiante->paginarEstudiantesControlador($pagina[1], 6, $_SESSION['tipo_sesion'], $_SESSION['codigo_cuenta_sesion'], "");
			?>

		</div>
	</div>
</div>
