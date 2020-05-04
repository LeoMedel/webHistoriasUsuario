<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> DATOS DEL EQUIPO</small></h1>
	</div>
	<p class="lead">Actualizar datos del equipo</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
<?php
	
	$datos = explode("/", $_GET['views']);



	//USUARIO
	if ($datos[1]!="")
	{
		
		if ($_SESSION['tipo_sesion'] >=3 || $_SESSION['tipo_sesion'] <=1)
		{
	        echo $loginControl->forzarCierreSesion();
	    }

	    require_once "./controladores/equipoControlador.php";
	    $controlEquipo = new equipoControlador();

	    $infoEquipo = $controlEquipo->mostrarInfoEquipoControlador($datos[1]);

	    if ($infoEquipo->rowCount()==1)
	    {

	    	$datosEq = $infoEquipo->fetch();


?>			
			<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; EQUIPO</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo SERVERURL; ?>ajax/equipoAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="idEquipo-up" value="<?php echo $datos[1]; ?>">
					    	<fieldset>
					    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del equipo</legend>
					    		<div class="container-fluid">
					    			<div class="row">
					    				
					    				<div class="col-xs-12">
									    	<div class="form-group label-floating">
											  	<label class="control-label">TITULO *</label>
											  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="tituloEq-up" value="<?php echo $datosEq['equipo']; ?>" required="" maxlength="40">
											</div>
					    				</div>
					    				
					    			</div>
					    		</div>
					    	</fieldset>
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
		<p>No podemos mostrar la información que solicita. Problemas tecnicos</p>

<?php
	}
?>

<!-- Panel mis datos -->
</div>
