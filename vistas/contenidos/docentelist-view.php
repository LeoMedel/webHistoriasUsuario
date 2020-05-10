
<?php
	if ($_SESSION['tipo_sesion'] >=2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios <small>DOCENTES</small></h1>
	</div>
	<p class="lead">Listado de los DOCENTES registrados en el sistema</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>docentelist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE DOCENTES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>docentes/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO DOCENTE
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

	require_once "./controladores/docenteControlador.php";

	$instanciaDocente = new docenteControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;DOCENTES</h3>
		</div>
		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaDocente->paginarDocentesControlador($pagina[1], 6, $_SESSION['tipo_sesion'], $_SESSION['codigo_cuenta_sesion'], "");
			?>

		</div>
	</div>
</div>
