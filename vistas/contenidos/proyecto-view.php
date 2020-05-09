
<?php
	if ($_SESSION['tipo_sesion'] != 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> PROYECTOS <small>Nuevo proyecto</small></h1>
	</div>
	<p class="lead">Agregar un nuevo PROYECTO</p>
</div>

<div class="container-fluid">
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
	  	<!--li>
	  		<a href="<?php echo SERVERURL; ?>adminsearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ADMINISTRADOR
	  		</a>
	  	</li-->
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROYECTO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/proyectoAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="CodigoCuenta-reg" value="<?php echo $loginControl->encriptar($_SESSION['codigo_cuenta_sesion']); ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del proyecto</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>TITULO: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Titulo general del proyecto *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="titulo-reg" required="" maxlength="20">
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
										<input class="form-control" type="datetime-local" value="2020-04-20T10:00:00" name="inicio-reg" min="2020-04-01" max="2022-04-21">
										</div>
									</div>
								  	<!--label class="control-label">Inicio del proyecto *</label-->
								  	<!--input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30"-->
								  	<!--input type="date" id="start" name="inicio-reg" value="2020-04-21" min="2020-04-01" max="2022-04-21"-->

								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<!--label class="control-label">Fin del proyecto</label-->
								  	<!--input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15"-->
								  	<!--input type="date" id="start" name="fin-reg" value="2020-04-21" min="2020-04-01" max="2022-04-21"-->
								  	<div class="form-group row">
										<label for="example-datetime-local-input" class="col-2 col-form-label">Fin del proyecto</label>
										<div class="col-10">
										<input class="form-control" type="datetime-local" value="2020-04-20T10:00:00" name="fin-reg" value="2020-04-21" min="2020-04-01" max="2022-04-21">
										</div>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Registrar proyecto </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>