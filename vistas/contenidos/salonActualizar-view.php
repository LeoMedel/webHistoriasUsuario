
<?php
	if ($_SESSION['tipo_sesion'] != 1) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> DATOS DEL SALON</small></h1>
	</div>
	<p class="lead">Actualizar datos del salon</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
<?php
	
	$datos = explode("/", $_GET['views']);



	//USUARIO
	if ($datos[1]!="")
	{
		
		if ($_SESSION['tipo_sesion'] != 1)
		{
	        echo $loginControl->forzarCierreSesion();
	    }

	    require_once "./controladores/salonControlador.php";
	    $controlSalon = new salonControlador();

	    $infoSalon = $controlSalon->mostrarInfoSalonControlador($datos[1]);

	    if ($infoSalon->rowCount()==1)
	    {

	    	$datosSalon = $infoSalon->fetch();


?>			
			<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; SALON</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo SERVERURL; ?>ajax/salonAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="idSalon-up" value="<?php echo $datos[1]; ?>">
					    	<fieldset>
					    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del salon</legend>
					    		<div class="container-fluid">
					    			<div class="row">
					    				
					    				<div class="col-xs-12">
									    	<div class="form-group label-floating">
											  	<label class="control-label">Nombre del salon *</label>
											  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ, 0-9+]{1,30}" class="form-control" type="text" name="salon-up" value="<?php echo $datosSalon['Salon']; ?>" required="" maxlength="30">
											</div>
					    				</div>
					    				
					    			</div>
					    		</div>
					    	</fieldset>
					    	<br>
					    	<br>
						    <p class="text-center" style="margin-top: 20px;">
						    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
						    </p>
						    <div class="RespuestaAjax"></div>
					    </form>
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
