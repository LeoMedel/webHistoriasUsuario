<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>


<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>INFORMACION DEL PROYECTO</small></h1>
	</div>
	<p class="lead">consultar datos del Proyecto</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; TODOS LOS PROYECTOS
	  		</a>
	  	</li>
	</ul>
</div>

<?php

	$datos = explode("/", $_GET['views']);

		require_once "./controladores/proyectoControlador.php";

		$claseProyecto = new proyectoControlador();

		$datosProyecto = $claseProyecto->mostrarInfoProyectoControlador($datos[1]);

		if($datosProyecto->rowCount()==1)
		{

			$camposProyecto = $datosProyecto->fetch();
		

?>

			<!-- Panel mi cuenta -->
			<div class="container-fluid">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Proyecto</h3>
					</div>
					<div class="panel-body">
						<h1>"<?php echo $camposProyecto['titulo']; ?>"</h1>

						<h3>Fechas del proyecto:</h3>

						<h6><?php echo $camposProyecto['fecha_inicio']; ?></h6>
						<h6><?php echo $camposProyecto['fecha_fin']; ?></h6>
					</div>
				</div>
			</div>

			<br>
			

<?php
		}
		else 
		{ 
?>
			<p>No encontro nada</p>
<?php 	
		}
	
?>
