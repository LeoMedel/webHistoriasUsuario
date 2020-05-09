<?php
	if ($_SESSION['tipo_sesion'] != 3) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> FASES <small>Actualizar fase</small></h1>
	</div>
	<p class="lead">Actualizar una FASE</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>faselist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE FASES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>fase/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA FASE
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

	    require_once "./controladores/faseControlador.php";
	    $controlFase = new faseControlador();

	    $infoFase = $controlFase->mostrarInfoFaseControlador($datos[1]);

	    if ($infoFase->rowCount()==1)
	    {

	    	$datosFase = $infoFase->fetch();


?>		

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Actualizar FASE</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/faseAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="CodigoProyecto-up" value="<?php echo $loginControl->encriptar($_SESSION['codigo_proyecto_sesion']); ?>">
				<input type="hidden" name="idFase-up" value="<?php echo $datos[1]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la fase</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>TITULO: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre de la fase *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" value="<?php echo $datosFase['fase']; ?>" name="tituloFase-up" required="" maxlength="20">
								</div>
		    				</div>

		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Descripcion de la fase</label>
								  	<textarea name="descripcionFase-up" class="form-control" rows="2" maxlength="100" ><?php echo $datosFase['descripcion']; ?></textarea>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Fechas de la fase</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<div class="form-group row">
										<label for="example-datetime-local-input" class="col-2 col-form-label">Inicio de la fase</label>
										<div class="col-10">
										<input class="form-control" type="date" value="<?php echo $datosFase['fecha_inicio']; ?>" name="inicioFase-up" min="2020-04-01" max="2022-04-21">
										</div>
									</div>

								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<div class="form-group row">
										<label for="example-datetime-local-input" class="col-2 col-form-label">Fin de la fase</label>
										<div class="col-10">
										<input class="form-control" type="date" value="<?php echo $datosFase['fecha_fin']; ?>" name="finFase-up" value="2020-04-21" min="2020-04-01" max="2022-04-21">
										</div>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Objetivo de la fase</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Objetivo de la fase</label>
								  	<textarea name="objetivoFase-up" class="form-control" rows="2" maxlength="100" ><?php echo $datosFase['objetivo']; ?></textarea>
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Actualizar fase </button>
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
