<?php
	if ($_SESSION['tipo_sesion'] != 1) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}


?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> SALON <small>Salon de clase</small></h1>
	</div>
	<p class="lead">Asignar el salon de clase</p>
</div>

<!--div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>proyectolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROYECTOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>proyecto/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROYECTO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>adminsearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
	  		</a>
	  	</li>
	</ul>
</div-->


<?php
	
	$datos = explode("/", $_GET['views']);

    require_once "./controladores/salonControlador.php";
    $controlSalon = new salonControlador();

    $infoSalon = $controlSalon->cargarSalonesControlador();

    $datoSalones = $infoSalon->fetchAll();

    //print_r($datoSalones);
?>


<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO SALON</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/salonAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="codigoUsuarioSalon-up" value="<?php echo $datos[1]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del salon</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>NOMBRE DEL SALON: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Salon *</label>
								  	<select class="form-control" name="salon-asig">
								  		<option value="0">Seleccione el salon</option>
										<?php
										foreach ($datoSalones as $salon)
										{
											echo '<option value="'. modeloPrincipal::encriptar($salon['id_salon']).'">'.$salon['Salon'].'</option>';
										}
										?>
								  	</select>
								</div>
		    				</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Registrar Salon </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>