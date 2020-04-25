
<?php
	if ($_SESSION['tipo_sesion'] >=3 || $_SESSION['tipo_sesion'] <=1) {
		echo $loginControl->forzarCierreSesion();
	}

	$datos = explode("/", $_GET['views']);
?>

<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> FUENTES <small>Nueva fuente</small></h1>
	</div>
	<p class="lead">Agregar una nueva FUENTE</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>metodologiaInfo/<?php echo $datos[1];?>" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; REGRESAR A LA METODOLOGIA
	  		</a>
	  	</li>
	  	
	</ul>
</div>


<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA FUENTE</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/fuenteAjax.php" method="POST" data-form="save" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="idMetodologia-reg" value="<?php echo $datos[1]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información de la fuente</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				
		    				<div class="col-xs-12">
		    					<p>FUENTE (URL): </p>
						    	<div class="form-group label-floating">
								  	<label class="control-label">link de la pagina *</label>
								  	<input class="form-control" type="text" name="url-reg" required="" maxlength="100">
								</div>
		    				</div>
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">DESCRIPCION DE LA FUENTE</label>
								  	<textarea name="descripcion-reg" class="form-control" rows="2" maxlength="100" ></textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-lg"><i class="zmdi zmdi-floppy"></i> Registrar metodología </button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
</div>