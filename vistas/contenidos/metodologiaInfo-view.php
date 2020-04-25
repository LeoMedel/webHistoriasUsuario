
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>INFORMACION DE LA METODOLOGÍA</small></h1>
	</div>
	<p class="lead">Consultar datos de la metodología</p>
</div>


<?php

	$datos = explode("/", $_GET['views']);

		require_once "./controladores/metodologiaControlador.php";

		$claseMetodologia = new metodologiaControlador();

		$datosMetodologia = $claseMetodologia->mostrarInfoMetodologiaControlador($datos[1]);

		if($datosMetodologia->rowCount()==1)
		{

			$camposMetodologia = $datosMetodologia->fetch();

			require_once "./controladores/fuenteControlador.php";

			$instanciaFuentes = new fuenteControlador();
		

?>

			<!-- Panel mi cuenta -->
			<div class="container-fluid">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Proyecto</h3>
					</div>
					<div class="panel-body">
						<h1>"<?php echo $camposMetodologia['metodologia']; ?>"</h1>

						<h3>Descripcion de la Metodología:</h3>

						<p> <?php echo $camposMetodologia['descripcion']; ?> </p>
					</div>
				</div>
			</div>

			<br>
			<div class="container-fluid">
				<ul class="breadcrumb breadcrumb-tabs">
					<li>
						<a href="<?php echo SERVERURL;?>fuentes/<?php echo $datos[1]?>" class="btn btn-danger">
							<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; AGREGAR FUENTE
						</a>
					</li>
				</ul>

				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="zmdi zmdi-format-list-bulleted">  FUENTES</i>
						</div>
					</div>
					<div class="panel-body">
						<?php

							$pagina = explode("/", $_GET['views']);

							echo $instanciaFuentes->paginarFuentesControlador($pagina[1], 10, $datos[1], "");
						?>
					</div>
				</div>
			</div>

			

<?php
		}
		else 
		{ 
?>
			<p>No se encontro nada</p>
<?php 	
		}
	
?>
