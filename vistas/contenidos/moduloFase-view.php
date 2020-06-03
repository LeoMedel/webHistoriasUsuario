<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>MODULO DE LA FASE</small></h1>
	</div>
	<p class="lead">Consultar datos de la fase</p>
</div>


<?php

	$datos = explode("/", $_GET['views']);

	require_once "./controladores/faseControlador.php";
	require_once "./controladores/moduloControlador.php";

	$claseFase = new faseControlador();
	$claseModulo = new moduloControlador();

	$infoFase = $claseFase->mostrarInfoFaseControlador($datos[1]);

	$datosFase = $infoFase->fetchAll();
	//print_r($datosFase);


?>
			<div class="container-fluid">
				<ul class="breadcrumb breadcrumb-tabs">
					<li>
						<a href="<?php echo SERVERURL;?>faselist/<?php echo $datos[1]?>" class="btn btn-info">
							<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE FASES
						</a>
					</li>
				</ul>
			</div>

			<!-- Panel mi cuenta -->
			<div class="container-fluid">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; FASE ACTUAL</h3>
					</div>
					<div class="panel-body">
						<h1>"<?php echo $datosFase[0]['fase']; ?>"</h1>

						<h3>Descripcion:</h3>

						<p> <?php echo $datosFase[0]['descripcion']; ?> </p-->
					</div>
				</div>
			</div>

			<br>
			<div class="container-fluid">
				<ul class="breadcrumb breadcrumb-tabs">
					<li>
						<a href="<?php echo SERVERURL;?>modulo/<?php echo $datos[1]?>" class="btn btn-danger">
							<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; AGREGAR MODULO
						</a>
					</li>
				</ul>

				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="zmdi zmdi-format-list-bulleted">  MODULOS DE LA FASE</i>
						</div>
					</div>
					<div class="panel-body">
						<?php

							$pagina = explode("/", $_GET['views']);

							echo $claseModulo->paginarModulosControlador($pagina[1], 100, $datos[1], "");
						?>
					</div>
				</div>
			</div>
