
<?php
	if ($_SESSION['tipo_sesion'] >= 2) {
		echo $loginControl->redireccionarUsuarioControlador($_SESSION['tipo_sesion']);
	}
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> SALONES <small>Nuevo salon</small></h1>
	</div>
	<p class="lead">Agregar un nuevo SALON</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>salonlist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE SALONES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>salon/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO SALON
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Panel nuevo salon -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO SALON</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/salonAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<!--input type="hidden" name="CodigoCuenta-reg" value="<?php echo $loginControl->encriptar($_SESSION['codigo_cuenta_sesion']); ?>"-->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información del salon</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>TITULO: </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre del salon *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ, 0-9+]{1,30}" class="form-control" type="text" name="salon-reg" required="" maxlength="20">
								</div>
		    				</div>
		    				
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Registrar proyecto </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>