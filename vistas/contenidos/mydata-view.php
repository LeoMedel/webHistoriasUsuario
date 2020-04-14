<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> DATOS PERSONALES</small></h1>
	</div>
	<p class="lead">Actualizar datos personales</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
<?php
	
	$datos = explode("/", $_GET['views']);



	//USUARIO
	if ($datos[1]=="admin" || $datos[1]=="docente" || $datos[1]=="estudiante")
	{
		
		if ($_SESSION['tipo_sesion'] != 1)
		{
	        echo $loginControl->forzarCierreSesion();
	    }

	    require_once "./controladores/administradorControlador.php";
	    $controlAdmin = new administradorControlador();

	    $infoAdmin = $controlAdmin->mostrarInfoAdministradoresControlador("unico", $datos[2]);

	    if ($infoAdmin->rowCount()==1)
	    {

	    	$datosAdmin = $infoAdmin->fetch();

	    	if ($datosAdmin['CuentaCodigo']!= $_SESSION['codigo_cuenta_sesion']) 
	    	{
	    		if ($_SESSION['tipo_sesion']>=2)
	    		{
	    			echo $loginControl->forzarCierreSesion();
	    		}
	    	}


?>			
			<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="cuenta-up" value="<?php echo $datos[2]; ?>">
							<input type="hidden" name="TipoCuenta-up" value="<?php echo $loginControl->encriptar($datos[1]); ?>">
					    	<fieldset>
					    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
					    		<div class="container-fluid">
					    			<div class="row">
					    				<div class="col-xs-12">
									    	<div class="form-group label-floating">
											  	<label class="control-label">DNI/CEDULA *</label>
											  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-up" value="<?php echo $datosAdmin['PersonaDNI']; ?>" required="" maxlength="30">
											</div>
					    				</div>
					    				<div class="col-xs-12 col-sm-6">
									    	<div class="form-group label-floating">
											  	<label class="control-label">Nombres *</label>
											  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-up" value="<?php echo $datosAdmin['PersonaNombre']; ?>" required="" maxlength="30">
											</div>
					    				</div>
					    				<div class="col-xs-12 col-sm-6">
											<div class="form-group label-floating">
											  	<label class="control-label">Apellidos *</label>
											  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-up" value="<?php echo $datosAdmin['PersonaApellido']; ?>" required="" maxlength="30">
											</div>
					    				</div>
					    				<div class="col-xs-12 col-sm-6">
											<div class="form-group label-floating">
											  	<label class="control-label">Teléfono</label>
											  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-up" value="<?php echo $datosAdmin['PersonaTelefono']; ?>" maxlength="15">
											</div>
					    				</div>
					    				<div class="col-xs-12">
											<div class="form-group label-floating">
											  	<label class="control-label">Dirección</label>
											  	<textarea name="direccion-up" class="form-control" rows="2" maxlength="100"><?php echo $datosAdmin['PersonaDireccion']; ?></textarea>
											</div>
					    				</div>
					    			</div>
					    		</div>
					    	</fieldset>
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
	//USUARIO
	elseif($datos[1]=="user")
	{
		
		echo "usuario";
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
