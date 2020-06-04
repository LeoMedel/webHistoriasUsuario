<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> HISTORIAS DE USUARIO <small>Historias de usuario del proyecto</small></h1>
	</div>
	<p class="lead">Consultar una Historias de Usuario</p>
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

?>

<!-- Panel Actividades en el Proyecto -->
<div class="container-fluid">
	<div class="panel panel-warning">
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
								  	<select class="form-control actividad" name="idActividad-reg" id="selectActividad">
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
			    <p class="text-center" style="margin-top: 20px;">
			    	<!--button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Registrar HISTORIA DE USUARIO </button-->
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
			
		</div>
	</div>
</div>

<!-- Panel HISTORIA -->
<div id="historiaUsuario"></div>
