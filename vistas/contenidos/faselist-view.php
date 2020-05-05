<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->forzarCierreSesion();
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> FASES <small>Fases del proyecto</small></h1>
	</div>
	<p class="lead">Fases registradas</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>faselist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE FASES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>fase/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA FASE
	  		</a>
	  	</li>
	</ul>
</div>

<?php

	require_once "./controladores/faseControlador.php";

	$instanciaFase = new faseControlador();

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

				echo $instanciaFase->paginarFasesControlador($pagina[1], 10, $_SESSION['codigo_proyecto_sesion'], "");
			?>
			
		</div>
	</div>
</div>