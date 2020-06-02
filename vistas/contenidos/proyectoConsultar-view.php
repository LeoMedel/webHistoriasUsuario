<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>PROYECTOS <small>Consultar</small></h1>
	</div>
	<p class="lead">Proyectos registrados</p>
</div>

<div class="container-fluid">
	<!--ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectoEquipolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROYECTOS CON EQUIPOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>proyectoEquipo/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ASIGNACION PROYECTO-EQUIPO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>equipoEstudiantes/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; AGREGAR ESTUDIANTE AL EQUIPO
	  		</a>
	  	</li>
	</ul-->
</div>

<?php

	require_once "./controladores/proyectoControlador.php";
	$claseProyecto = new proyectoControlador();
	$datosPro = $claseProyecto->cargarProyectosControlador($_SESSION['codigo_cuenta_sesion']);
	$datosPro = $datosPro->fetchAll();

?>

<!-- Panel listado de PROYECTOS -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Equipos</h3>
		</div>

		
		<div class="panel-body">
			
			<form action="<?php echo SERVERURL; ?>ajax/proyectoAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
					<!--input type="hidden" name="CodigoCuenta-asig" value="<?php echo $loginControl->encriptar($_SESSION['codigo_cuenta_sesion']); ?>"-->
			    	<fieldset>
			    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Consultar un proyecto</legend>
			    		<div class="container-fluid">
			    			<div class="row">
			    				<p>PROYECTO </p>

			    				<div class="col-xs-12">
									<div class="form-group label-floating">
									  	<label class="control-label">Proyecto *</label>
									  	<select id="selectProyectos" class="form-control" name="proyectoEq-asig">
									  		<option value="0">Seleccione el proyecto</option>
											<?php
											foreach ($datosPro as $proyecto)
											{
												echo '<option value="'.modeloPrincipal::encriptar($proyecto['id_proyecto']).'">'.$proyecto['titulo'].'</option>';
											}
											?>
									  	</select>
									</div>
			    				</div>
			    				
			    				<!--div class="col-xs-12">
			    					
							    	<div class="form-group label-floating">
									  	<label class="control-label">Equipo *</label>
									  	<select class="form-control" name="equipoPro-asig">
									  		<option value="0">Seleccione el equipo</option>
											<?php
											foreach ($datosEquipos as $equipo)
											{
												echo '<option value="'.modeloPrincipal::encriptar($equipo['id_equipo']).'">'.$equipo['equipo'].'</option>';
											}
											?>
									  	</select>
									</div>
			    				</div-->
			    				
			    			</div>
			    		</div>
			    	</fieldset>
			    	<br>
				    <!--p class="text-center" style="margin-top: 20px;">
				    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Asignar equipo </button>
				    </p>
				    <div class="RespuestaAjax"></div-->
			</form>
		</div>
	</div>
</div>

<!-- Panel listado de PROYECTOS -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;Nombre del Equipo</h3>
		</div>

		
		<div class="panel-body">
			
			<div id="selectEquipo"></div>

			

		</div>
	</div>
</div>