<?php
	if ($_SESSION['tipo_sesion'] >= 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> SALONES <small>Listado de salones</small></h1>
	</div>
	<p class="lead">Salones registrados</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>salonlist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE SALONES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>salon/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO SALON
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

	require_once "./controladores/salonControlador.php";

	$instanciaSalon = new salonControlador();

?>

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Salones</h3>
		</div>

		
		<div class="panel-body">

			<?php

				$pagina = explode("/", $_GET['views']);

				echo $instanciaSalon->paginarSalonesControlador($pagina[1], 6, $_SESSION['codigo_cuenta_sesion'], "");
			?>
			
		</div>
	</div>
</div>