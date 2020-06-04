<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> HISTORIAS DE USUARIO <small>Historias de usuario del proyecto desarrollado</small></h1>
	</div>
	<p class="lead">Historias de Usuario registradas</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>historiaUsuarioConsultar/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; CONSULTAR HISTORIAS DE USUARIO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>historiasUsuario/" class="btn btn-success">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA HISTORIA DE USUARIO
	  		</a>
	  	</li>
	</ul>
</div>

<?php

	require_once "./controladores/actividadControlador.php";
	$claseActividad = new actividadControlador();
	$datosActividades = $claseActividad->cargarActividadesControlador($_SESSION['codigo_equipo_sesion']);
	$actividades = $datosActividades->fetchAll();

	require_once "./controladores/equipoControlador.php";
	$claseEquipo = new equipoControlador();
	$datosEquipo = $claseEquipo->cargarEquipoIntegrantesControlador($_SESSION['codigo_equipo_sesion']);
	$integrantesEquipo = $datosEquipo->fetchAll();

	require_once "./controladores/recursoControlador.php";
	$claseRecurso = new recursoControlador();
	$datosRecursos = $claseRecurso->cargarRecursosControlador($_SESSION['codigo_equipo_sesion']);
	$recursos = $datosRecursos->fetchAll();

	//print_r($integrantesEquipo);

?>

<!-- Panel Actividades en el Proyecto -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;ACTIVIDAD</h3>
		</div>

		
		<div class="panel-body">

			<form action="<?php echo SERVERURL; ?>ajax/historiaUsuarioAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<!--input type="hidden" name="CodigoEquipo-reg" value="<?php echo $loginControl->encriptar($_SESSION['codigo_equipo_sesion']); ?>"-->
				<!-- ACTIVIDAD -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; ACTIVIDAD</legend>
		    		<div class="container-fluid">
		    			<div class="row">

		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Actividad *</label>
								  	<select class="form-control" name="idActividad-reg">
								  		<option value="0">Seleccione la actividad</option>
										<?php
										foreach ($actividades as $actividad)
										{
											echo '<option value="'.modeloPrincipal::encriptar($actividad['id_actividad']).'">'.$actividad['actividad'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<br>
		    	<!-- RESPONSABLE DE LA HISTORIA -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; RESPONSABLE</legend>
		    		<div class="container-fluid">
		    			<div class="row">

		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Integrante del equipo *</label>
								  	<select class="form-control" name="responsable-reg">
								  		<option value="0">Seleccione al responsable</option>
										<?php
										foreach ($integrantesEquipo as $integrante)
										{
											echo '<option value="'.modeloPrincipal::encriptar($integrante['CuentaCodigo']).'">'.$integrante['PersonaNombre'].' '.$integrante['PersonaApellido'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<br>
		    	<!-- HISTORIA DE USUARIO -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; HISTORIA DE USUARIO</legend>
		    		<div class="container-fluid">
		    			<div class="row">

		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Informacion de la Historia de usuario</label>
								  	<textarea name="historiaUsuario-reg" class="form-control" rows="2" maxlength="200" ></textarea>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<br>
		    	<!-- RECURSO -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; RECURSO EMPLEADO </legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Descripcion del recurso *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="recurso-reg" required="" maxlength="20">
								</div>
		    				</div>

		    				<div class="col-xs-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Tipo del Recurso *</label>
								  	<select class="form-control" name="tipoRecurso-reg">
								  		<option value="0">Seleccione el tipo de recurso empleado</option>
										<?php
										foreach ($recursos as $recurso)
										{
											echo '<option value="'.modeloPrincipal::encriptar($recurso['id_tipo_recurso']).'">'.$recurso['descripcion_recurso'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>

		    				<div class="col-xs-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Cantidad de recursos *</label>
								  	<select class="form-control" name="cantidadRecurso-reg">
								  		<option value="1">1</option>
								  		<option value="2">2</option>
								  		<option value="3">3</option>
								  		<option value="4">4</option>
								  		<option value="5">5</option>
								  		<option value="6">6</option>
								  		<option value="7">7</option>
								  		<option value="8">8</option>
								  		<option value="9">9</option>
								  		<option value="10">10</option>										
								  	</select>
								</div>
		    				</div>
		    				<div class="col-xs-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Precio total del recurso *</label>
								  	<input pattern="[0-9]{1,30}" class="form-control" type="text" name="precioRecurso-reg" required="" maxlength="20">
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Registrar HISTORIA DE USUARIO </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
			
		</div>
	</div>
</div>
