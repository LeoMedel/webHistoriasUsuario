<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> DATOS DEL PROYECTO</small></h1>
	</div>
	<p class="lead">Actualizar datos del proyecto</p>
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

	    require_once "./controladores/proyectoControlador.php";
	    $controlProyecto = new proyectoControlador();

	    $infoProyecto = $controlProyecto->mostrarInfoProyectoControlador($datos[1]);

	    if ($infoProyecto->rowCount()==1)
	    {

	    	$datosPro = $infoProyecto->fetch();


?>			
			<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; PROYECTO</h3>
					</div>
					<div class="panel-body">
						<form action="<?php echo SERVERURL; ?>ajax/proyectoAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							<input type="hidden" name="idProyecto-up" value="<?php echo $datos[1]; ?>">
					    	<fieldset>
					    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del proyecto</legend>
					    		<div class="container-fluid">
					    			<div class="row">
					    				
					    				<div class="col-xs-12">
									    	<div class="form-group label-floating">
											  	<label class="control-label">TITULO *</label>
											  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="titulo-up" value="<?php echo $datosPro['titulo']; ?>" required="" maxlength="30">
											</div>
					    				</div>
					    				
					    			</div>
					    		</div>
					    	</fieldset>
					    	<br>
					    	<fieldset>
					    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Fechas del proyecto</legend>
					    		<div class="container-fluid">
					    			<div class="row">
					    				<div class="col-xs-12 col-sm-6">
											<div class="form-group label-floating">
												<div class="form-group row">
													<label for="example-datetime-local-input" class="col-2 col-form-label">Inicio del proyecto</label>
													<div class="col-10">
													<input class="form-control" type="date" value="<?php echo $datosPro['fecha_inicio']; ?>" name="inicio-up" min="2020-04-01" max="2022-04-21">
													</div>
												</div>

											</div>
					    				</div>
					    				<div class="col-xs-12 col-sm-6">
											<div class="form-group label-floating">
											  	<div class="form-group row">
													<label for="example-datetime-local-input" class="col-2 col-form-label">Fin del proyecto</label>
													<div class="col-10">
													<input class="form-control" type="date" value="<?php echo $datosPro['fecha_fin']; ?>" name="fin-up" min="2020-04-01" max="2022-04-21">
													</div>
												</div>
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
		<p>No podemos mostrar la información que solicita. problemas tecnicos</p>

<?php
	}
?>

<!-- Panel mis datos -->
</div>
