<?php
    if ($_SESSION['tipo_sesion'] != 2) {

        echo $loginControl->forzarCierreSesion();
        //echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
    }

    require_once "./controladores/equipoControlador.php";
	$claseEquipo = new equipoControlador();
	$datosEquipos = $claseEquipo->cargarEquiposControlador($_SESSION['codigo_cuenta_sesion']);
	$datosEquipos = $datosEquipos->fetchAll();

	require_once "./controladores/proyectoControlador.php";
	$claseProyecto = new proyectoControlador();
	$datosPro = $claseProyecto->cargarProyectosControlador($_SESSION['codigo_cuenta_sesion']);
	$datosPro = $datosPro->fetchAll();


?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>ASIGNACION DE METODOLOGIA</small></h1>
	</div>
	<p class="lead">Asignación del equipo para el proyecto</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VER LOS PROYECTOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>proyectoEquipolist/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VER LAS RELACIONES PROYECTO-EQUIPO
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
			<form action="<?php echo SERVERURL; ?>ajax/proyectoAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del equipo</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>NOMBRE DEL EQUIPO: </p>
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
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Proyecto *</label>
								  	<select class="form-control" name="proyectoEq-asig">
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
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Asignar equipo </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>