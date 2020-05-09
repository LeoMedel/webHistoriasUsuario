<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> METODOLOGÍAS <small>Listado de metodologías</small></h1>
	</div>
	<p class="lead">Metodologias registradas</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>metodologialist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE METODOLOGÍAS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>metodologia/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA METODOLOGÍA
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

	require_once "./controladores/metodologiaControlador.php";

	$instanciaMetodologia = new metodologiaControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Metodologías</h3>
		</div>

		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaMetodologia->paginarMetodologiasControlador($pagina[1], 6, $_SESSION['codigo_cuenta_sesion'], "");
			?>

		</div>
	</div>
</div>