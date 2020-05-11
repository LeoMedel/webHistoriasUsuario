<?php

	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}

    require_once "./controladores/metodologiaControlador.php";
	$claseMetodo = new metodologiaControlador();
	$datosMeto = $claseMetodo->cargarMetodologiasControlador($_SESSION['codigo_cuenta_sesion']);
	$datosMeto = $datosMeto->fetchAll();

	require_once "./controladores/proyectoControlador.php";
	$claseProyecto = new proyectoControlador();
	$datosPro = $claseProyecto->cargarProyectosControlador($_SESSION['codigo_cuenta_sesion']);
	$datosPro = $datosPro->fetchAll();


?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>ASIGNACION DE METODOLOGIA</small></h1>
	</div>
	<p class="lead">Asignación de la metodología a utilizar en un proyecto</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VER LOS PROYECTOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>proyectoMetodologialist/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; VER LAS RELACIONES PROYECTO-METODOLOGIA
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
				<input type="hidden" name="CodigoCuenta-asig" value="<?php echo $loginControl->encriptar($_SESSION['codigo_cuenta_sesion']); ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la metodología y el Proyecto</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>NOMBRE DE LA METODOLOGIA: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Metodologia *</label>
								  	<select class="form-control" name="metodologia-asig">
								  		<option value="0">Seleccione la metodologia</option>
										<?php
										foreach ($datosMeto as $metodologia)
										{
											echo '<option value="'.$metodologia['id_metodologia'].'">'.$metodologia['metodologia'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Proyecto *</label>
								  	<select class="form-control" name="proyecto-asig">
								  		<option value="0">Seleccione el proyecto</option>
										<?php
										foreach ($datosPro as $proyecto)
										{
											echo '<option value="'.$proyecto['id_proyecto'].'">'.$proyecto['titulo'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Objetivo</label>
								  	<textarea name="objetivo-asig" class="form-control" rows="2" maxlength="100" required=""></textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Asignar metodología </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>