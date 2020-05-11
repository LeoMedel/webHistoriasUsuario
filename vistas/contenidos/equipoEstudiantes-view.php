<?php

	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}

    require_once "./controladores/estudianteControlador.php";
	$claseEstudiante = new estudianteControlador();
	$datosEstudiante = $claseEstudiante->cargarEstudiantesControlador($_SESSION['salon_sesion']);
	$datosEstudiante = $datosEstudiante->fetchAll();

	require_once "./controladores/equipoControlador.php";
	$claseEquipo = new equipoControlador();
	$datosEq = $claseEquipo->cargarEquiposControlador($_SESSION['codigo_cuenta_sesion']);
	$datosEq = $datosEq->fetchAll();


?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>AGREGAR ESTUDIANTE AL EQUIPO</small></h1>
	</div>
	<p class="lead">Asignación de un estudiante con un equipo</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>equipolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VER LOS EQUIPOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>equipoEstudianteslist/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VER LAS ASIGNACIONES
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ASIGNACION</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/equipoAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="cuentaCreador-asig" value="<?php echo modeloPrincipal::encriptar($_SESSION['codigo_cuenta_sesion']); ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del Estudiante y del Equipo</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>NOMBRE DEL ESTUDIANTE: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Estudiante *</label>
								  	<select class="form-control" name="estudiante-asig">
								  		<option value="0">Seleccione el Estudiante</option>
										<?php
										foreach ($datosEstudiante as $estudiante)
										{
											echo '<option value="'. modeloPrincipal::encriptar($estudiante['CuentaCodigo']).'">'.$estudiante['PersonaNombre'].' '.$estudiante['PersonaApellido'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Equipo *</label>
								  	<select class="form-control" name="equipo-asig">
								  		<option value="0">Seleccione el Equipo</option>
										<?php
										foreach ($datosEq as $equipo)
										{
											echo '<option value="'. modeloPrincipal::encriptar($equipo['id_equipo']).'">'.$equipo['equipo'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Agregar al Equipo </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>