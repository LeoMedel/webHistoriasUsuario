<?php
	if ($_SESSION['tipo_sesion'] >=3 || $_SESSION['tipo_sesion'] <=1 ) {
		echo $loginControl->forzarCierreSesion();
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

<!--?php

	//require_once "./controladores/administradorControlador.php";

	//$instanciaAdministrador = new administradorControlador();

?-->

<!-- Panel listado de administradores -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Metodologías</h3>
		</div>

		<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">METODOLOGÍA</th>
						<th class="text-center">DESCRIPCION</th>
						<th class="text-center">CONSULTAR</th>
						<th class="text-center">ACTUALIZAR</th>
						<th class="text-center">ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="6">No hay metodologías registradas</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--div class="panel-body">

			
		</div-->
	</div>
</div>