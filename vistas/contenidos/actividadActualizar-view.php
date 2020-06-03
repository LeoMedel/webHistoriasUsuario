<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> ACTIVIDADES <small>Actualizar actividad</small></h1>
	</div>
	<p class="lead">Actualizar una actividad</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>actividadeslist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ACTIVIDADES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>actividad/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ACTIVIDAD
	  		</a>
	  	</li>
	  	
	</ul>
</div>

<?php

	
	$datos = explode("/", $_GET['views']);



	//USUARIO
	if ($datos[1]!="")
	{
		
		if ($_SESSION['tipo_sesion'] !=3)
		{
	        echo $loginControl->forzarCierreSesion();
	    }

	    require_once "./controladores/actividadControlador.php";
	    $controlActividad = new actividadControlador();

	    $infoActividad = $controlActividad->mostrarInfoActividadControlador($datos[1]);

	    if ($infoActividad->rowCount()==1)
	    {
	    	require_once "./controladores/moduloControlador.php";
			$claseModulo = new moduloControlador();
			$datosModulos = $claseModulo->cargarModulosControlador($_SESSION['codigo_equipo_sesion']);
			$modulos = $datosModulos->fetchAll();

	    	$datosActividad = $infoActividad->fetch();


?>		

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Actualizar ACTIVIDAD</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/actividadAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<!--input type="hidden" name="CodigoProyecto-up" value="<?php echo $loginControl->encriptar($_SESSION['codigo_proyecto_sesion']); ?>"-->
				<input type="hidden" name="idActividad-up" value="<?php echo $datos[1]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la actividad</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>ACTIVIDAD: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre de la acividad *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" value="<?php echo $datosActividad['actividad']; ?>" name="actividad-up" required="" maxlength="20">
								</div>
		    				</div>

		    				<div class="col-xs-12">
								<p>MODULO DE LA ACTIVIDAD: </p>
								<div class="form-group label-floating">
								  	<label class="control-label">Modulo de la actividad *</label>
								  	<select class="form-control" name="idModulo-up">
								  		<option value="0">Seleccione el modulo</option>
										<?php
										foreach ($modulos as $modulo)
										{
											echo '<option value="'.modeloPrincipal::encriptar($modulo['id_modulo']).'">'.$modulo['titulo'].'</option>';
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
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Actualizar actividad </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>
<?php
	    }
	    else
	    {
?>
			<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
			<h2>Lo sentimos...</h2>
			<p>No podemos mostrar la información solicitada</p>
<?php
	    }
	    


	}
	//ERROR	
	else{
?>		
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h2>Lo sentimos...</h2>
		<p>No podemos mostrar la información que solicita. problemas tecnicos</p>

<?php
	}
?>

<!-- Panel mis datos -->
</div>
